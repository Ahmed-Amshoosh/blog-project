<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\AdminInfo;
use App\Models\Appointment;
use App\Models\Comment;
use App\Models\DailyStatistic;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use App\Services\SocialMediaService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $socialMediaService;

//    public function __construct(SocialMediaService $socialMediaService)
//    {
//        $this->socialMediaService = $socialMediaService;
//    }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            app('App\Services\VisitorService')->trackVisitor();  // Track the visitor
            return $next($request);
        });
    }

    public function index(){
        $count_appoitment=Appointment::all()->count();
        $count_post=Post::all()->count();
        $count_comment=Comment::all()->count();
//        $count_department=Department::all()->count();
        $count_users=User::all()->count();
        $totalViews = Post::sum('views');
        $totalViewsToday = Post::whereDate('created_at', Carbon::today())->sum('views');

        $statistics = DailyStatistic::whereBetween('date', [Carbon::now()->subMonth(), Carbon::now()])
            ->get()
            ->groupBy('date')
            ->map(function ($row) {
                return [
                    'visitors' => $row->sum('visitors'),
                    'views' => $row->sum('views'),
                ];
            });



//        $youtubeSubscribers = $this->socialMediaService->getYouTubeSubscribers(env('YOUTUBE_API_KEY'), env('YOUTUBE_CHANNEL_ID'));
//        $facebookFollowers = $this->socialMediaService->getFacebookFollowers(env('FACEBOOK_ACCESS_TOKEN'), env('FACEBOOK_PAGE_ID'));
//        $instagramFollowers = $this->socialMediaService->getInstagramFollowers(env('INSTAGRAM_ACCESS_TOKEN'), env('INSTAGRAM_USER_ID'));
//        $twitterFollowers = $this->socialMediaService->getTwitterFollowers(env('TWITTER_BEARER_TOKEN'), env('TWITTER_USERNAME'));


        return view('admin.home',compact('totalViewsToday','statistics','totalViews','count_comment','count_appoitment','count_users','count_post'));
    }


    public function login(){
        $websiteName=Setting::all()->first();
        return view('auth.login',compact('websiteName'));
    }
    public function loginPost(Request $request){
        $request->validate([
            "email"=>'required',
            "password"=>'required',
        ]);

        $user_login=$request->only('email','password');
        $remember = $request->has('remember');
        if (Auth::attempt($user_login,$remember)){

            if(auth()->user()->usertype  == 1){
                return redirect()->intended(route('admin/home'));
            }
            else{
                return redirect()->intended(route('home'));
            }



        }else{
            return redirect(route('login'))->with('error', 'Incorrect Email Or Password ' );
        }

    }

    public function register(){
        return view('auth.register');
    }
    public function registerPost(Request $request){
        $request->validate([
           "name"=>'required',
           "email"=>'required|unique:users',
           "password"=>'required|min:5',
        ]);


        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        if ($user->save()){
            return redirect(route('login'))->with('success', 'User Created Successfully' );
        }
        else{
            return redirect(route('register'))->with('error', 'Failed to Create account' );
        }


    }


    public function showForgotForm()
    {
        return view('auth.forgetPassword'); // Create this view to handle the form
    }

    // Handle the sending of the reset link
    public function sendResetLink(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            $user->remember_token=Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgotPassword($user));
            return back()->with(['success' => 'Please check your email and reset your password.']);
        }
        else{
            return back()->withErrors(['email' => 'This email does not exist in our records.']);
        }
//        $request->validate(['email' => 'required|email']);
//        $user = User::where('email', $request->email)->first();
//        if (empty(!$user)) {
//            $user->remember_token=Str::random(40);
//            $user->save();
//            Mail::to($user->email)->send(new ForgotPassword($user));
//            return back()->withErrors(['email' => 'Please check your email and reset your password.']);
//        }
//        else{
//            return back()->withErrors(['email' => 'This email does not exist in our records.']);
//        }
//
//        // Generate token
//        $token = Str::random(60);
//
//        // Save the token in the password_resets table
//        DB::table('password_resets')->insert([
//            'email' => $request->email,
//            'token' => $token,
//            'created_at' => Carbon::now()
//        ]);
//
//        // Send the reset link via email
//        Mail::send('auth.emails.password', ['token' => $token], function ($message) use ($request) {
//            $message->to($request->email);
//            $message->subject('Reset Password Notification');
//        });
//
//        return back()->with('status', 'We have emailed your password reset link!');
    }

    // Show the password reset form
    public function showResetForm($token)
    {
        $user=User::where('remember_token', $token)->first();
        if (!empty($user)){
            $data['user']=$user;
            return view('auth.password_reset', $data );
        }
        else{
            abort(404);
        }
       // Create this view to handle the form
    }

    // Handle the password reset
    public function resetPassword(Request $request,$token)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
//            'token' => 'required'
        ]);
        $user=User::where('remember_token', $token)->first();
        if (!empty($user)){
          $user->password = Hash::make($request->password);
          if (empty($user->email_verified_at)){
              $user->email_verified_at = date('Y-m-d H:i:s');
          }
          $user->remember_token = Str::random(40);
          $user->save();
          return redirect()->route('login')->with('status', 'Your password has been reset!');

        }
        else{
            abort(404);
        }

//
//        // Check if the token exists
//        $reset = DB::table('password_resets')->where([
//            'email' => $request->email,
////            'token' => $request->token
//        ])->first();
//
//        if (!$reset) {
//            return back()->withErrors(['email' => 'Invalid token or email.']);
//        }
//
//        // Reset the password
//        $user = User::where('email', $request->email)->first();
//        $user->password = Hash::make($request->password);
//        $user->save();
//
//        // Delete the reset token
//        DB::table('password_resets')->where(['email' => $request->email])->delete();

//        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }


    public function appointments(Request $request){
        $appoints=Appointment::paginate(10);
        if($request->search_by_name){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')->get();
        }
        if($request->search_by_phone){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_phone.'%')->get();
        }
        if($request->search_by_date){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_date.'%')->get();
        }
        if($request->search_by_name && $request->search_by_phone){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
                ->where('phone','LIKE','%'.$request->search_by_phone.'%')
                ->get();
        }
        if($request->search_by_name && $request->search_by_date){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
                ->where('date','LIKE','%'.$request->search_by_date.'%')
                ->get();
        }
        if($request->search_by_phone && $request->search_by_date){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
                ->where('phone','LIKE','%'.$request->search_by_phone.'%')
                ->get();
        }
        if($request->search_by_name && $request->search_by_phone && $request->search_by_date){
            $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
                ->where('phone','LIKE','%'.$request->search_by_phone.'%')
                ->where('date','LIKE','%'.$request->search_by_date.'%')
                ->get();
        }


       return view('admin.Appoitment.appointments' , compact('appoints'));
    }


    public function add_appointment(){
        $doctors=Doctor::all();
        $departs=Department::all();
       return view('admin.Appoitment.add_appointment', compact('doctors','departs'));
    }

 public function search_appoit(Request $request){

     $appoints=Appointment::all();
     if($request->search_by_name){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')->get();
     }
     if($request->search_by_phone){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_phone.'%')->get();
     }
     if($request->search_by_date){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_date.'%')->get();
     }
     if($request->search_by_name && $request->search_by_phone){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
             ->where('phone','LIKE','%'.$request->search_by_phone.'%')
             ->get();
     }
     if($request->search_by_name && $request->search_by_date){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
             ->where('date','LIKE','%'.$request->search_by_date.'%')
             ->get();
     }
     if($request->search_by_phone && $request->search_by_date){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
             ->where('phone','LIKE','%'.$request->search_by_phone.'%')
             ->get();
     }
     if($request->search_by_name && $request->search_by_phone && $request->search_by_date){
         $appoints=Appointment::where('name','LIKE','%'.$request->search_by_name.'%')
             ->where('phone','LIKE','%'.$request->search_by_phone.'%')
             ->where('date','LIKE','%'.$request->search_by_date.'%')
             ->get();
     }


     return view('admin.Appoitment.appointments' , compact('appoints'));
    }

    public function create_appointment(Request $request){

        $request->validate([
            "fname"=>'required',
            "age"=>'required',
            "gender"=>'required',
            "depart"=>'required',
            "doctor"=>'required',
            "date"=>'required',
            "phone"=>'required',
        ]);

        $appoint=new Appointment();
        $appoint->name=$request->fname ;
        $appoint->age=$request->age;
        $appoint->user_id=Auth::user()->id;
        $appoint->gender=$request->gender;
        $appoint->depart=$request->depart;
        $appoint->doctor=$request->doctor;
        $appoint->date=$request->date;
        $appoint->phone=$request->phone;
        $appoint->address=$request->address;

        if ($appoint->save()){
            return redirect()->back()->with('message', 'Appointment Created Successfully');
        }
        else{
            return redirect()->back();
        }


    }

    public function edit_appointment($id){
        $appoint=Appointment::find($id);


        return view('admin.Appoitment.edit_appointment' , compact('appoint'));
    }

    public function update_appointment(Request $request ,$id){
        $request->validate([
            "fname"=>'required',
            "age"=>'required',
            "gender"=>'required',
            "depart"=>'required',
            "doctor"=>'required',
            "date"=>'required',
            "phone"=>'required',
        ]);

        $appoint=Appointment::find($id);
        $appoint->name=$request->fname ;
        $appoint->age=$request->age;
        $appoint->gender=$request->gender;
        $appoint->depart=$request->depart;
        $appoint->doctor=$request->doctor;
        $appoint->date=$request->date;
        $appoint->phone=$request->phone;
        $appoint->address=$request->address;

        if ($appoint->save()){
            return redirect(route('admin.appointments'))->with('message', 'Appointment Updated Successfully');
        }
        else{
            return redirect()->back();
        }
    }

    public function delete_appointment($id){
        $appoint=Appointment::find($id);
        $appoint->delete();

        return redirect()->back();
    }

    public function complate_appointment($id){
        $appoint=Appointment::find($id);
        if($appoint->status == 'pending'){
            $appoint->status='complated';
        }
        else{
            $appoint->status='pending';
        }

        $appoint->save();

        return redirect()->back();
    }


//    public function search_appoit(Request $request){
//        return $request;
//    }




    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }


    public function user_logout(){
        Auth::logout();
        return redirect(url('/'));
    }


}
