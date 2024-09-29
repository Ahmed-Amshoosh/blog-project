<?php

namespace App\Http\Controllers;

use App\Models\AdminInfo;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jorenvh\Share\Share;

class PostsController extends Controller
{
    public function index(){
        $post=Post::all();
        $admin_info=AdminInfo::all()->first();
        return view('admin.posts.index',compact('admin_info','post'));
    }
    public function add_post(){
        $categories=Category::all();
        return view('admin.posts.add_post',compact('categories'));
    }
    public function create_post(Request $request){


        $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'big_desc' => 'required|string',
            'image' => 'required',
            'category' => 'required|exists:categories,name',
        ]);






        $description=$request->big_desc;

        $dom = new \DomDocument();

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

//        $post=new Post();
//        $post->title=$request->title;

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);


//        $post->image=$imageName;
//        $post->category=$request->category;
//        $post->desc=$description;
//        $post->save();

        DB::table('posts')->insert([
            'title' => $request->title,
            'image'=> $imageName,
            'category'=>$request->category,
//            'url'=>$request->url,
            'big_desc'=>$description,
            'short_desc'=>$request->short_desc,
            'created_at'=> now()->format('Y-m-d H:i:s')

        ]);



        return redirect(route('admin.posts'));
    }


    public function  edit_post($id){
        $post=Post::find($id);
        $categories=Category::all();


        return view('admin.posts.edit_post' ,compact('post','categories'));

    }

    public function update_post(Request $request ,$id){

        $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'big_desc' => 'required|string',
            'category' => 'required|exists:categories,name',

        ]);


        $description=$request->big_desc;
        $post=Post::find($id);
        $dom = new \DomDocument();

        if  (! $description === $post->desc){

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



        $post->title=$request->title;
        $post->category=$request->category;
//        $post->url=$request->url;


        if (!$request->image == null) {

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);


            $post->image = $imageName;
        }
        $post->big_desc=$description;
        $post->short_desc=$request->short_desc;

        $post->save();

        return redirect(route('admin.posts'));

    }


    public function post_detail($id){
        $post=Post::findOrFail($id);

        $commints= DB::table('comments')
            ->where('post_id', $id)->get();
        $commints_count= DB::table('comments')
            ->where('post_id', $id)->count();
        $modeLike= DB::table('likes')
            ->where('likeable_id', $id)->get();
//        dd($islike);

        $shareComponent=\Share::page(route('admin.post_detail',$post->id), '$post->title')
            ->facebook()
            ->twitter()
            ->linkedin('Extra linkedin summary can be passed here')
            ->whatsapp();



        return view('admin.posts.post_detail' ,compact('post','shareComponent', 'commints','commints_count','modeLike'));
    }

    public function delete_post($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }








}
