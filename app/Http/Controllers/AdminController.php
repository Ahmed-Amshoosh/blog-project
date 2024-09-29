<?php

namespace App\Http\Controllers;

use App\Models\AdminInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_info()
    {
        $admin_info=AdminInfo::find(1);
        return view('admin.adminInfo',compact('admin_info'));
    }

    public function update_admin_info(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_desc' => 'required',
            'big_desc' => 'required',
            'email' => 'required',
        ]);

        $description=$request->big_desc;
        $admin_info=AdminInfo::find(1);
        $dom = new \DomDocument();

        if  (! $description === $admin_info->big_desc){

            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $imageFile = $dom->getElementsByTagName('imageFile');

            foreach($imageFile as $item => $image)
            {

                $data = $img->getAttribute('src');

                list($type, $data) = explode(';', $data);

                list(, $data)      = explode(',', $data);

                $imgeData = base64_decode($data);

                $image_name= "/upload/" . time().$item.'.png';

                $path = public_path() . $image_name;

                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');

                $image->setAttribute('src', $image_name);
            }

            $description = $dom->saveHTML();

        }



        $admin_info->name=$request->name;
        $admin_info->email=$request->email;


        if (!$request->image == null) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $admin_info->image =$imageName;

        }
        $admin_info->big_desc=$description;
        $admin_info->short_desc=$request->short_desc;

        $admin_info->save();

        return redirect()->back()->with('success', 'Update Admin Information successfully!');
    }
    public function user_info(Request $request)
    {
        $users=User::where('usertype' ,'!=',1)->paginate(10);
        $word='';
        if($request->ser_by_name){
            $users=User::where('name','LIKE','%'.$request->ser_by_name.'%')->where('usertype' ,'!=',1)->paginate(10);
            $word=$request->ser_by_name;
        }
        if($request->ser_by_email){
            $users=User::where('email','LIKE','%'.$request->ser_by_email.'%')->where('usertype' ,'!=',1)->paginate(10);
            $word=$request->ser_by_email;

        }

        if($request->ser_by_name && $request->ser_by_email){
            $users=User::where('name','LIKE','%'.$request->ser_by_name.'%')
                ->where('email','LIKE','%'.$request->ser_by_email.'%')
                ->where('usertype' ,'!=',1)->paginate(10);

        }


        return view('admin.users',compact('users','word'));
    }
    public function delete_user($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User has been successfully Deleted!');
    }
//    ====================================

    public function change_password()
    {
        return view('admin.change_password');
    }
    public function update_password(Request $request)
    {
        // Validate the input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        // Check if the current password is valid
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');

    }


}
