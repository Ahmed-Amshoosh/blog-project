<?php

namespace App\Http\Controllers;

use App\Models\AdminInfo;
use App\Models\Category;
use App\Models\Post;
use App\Models\SocialMediaAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function home(){
        $adminInfo=AdminInfo::all()->first();
        $categories=Category::all();
        $latestPostCreated =  Post::latest()->first();
        $latestPostCreatedID =  optional(Post::latest()->first())->id;
        $latestPosts=Post::where('id' ,'!=',$latestPostCreatedID)->paginate(10);
//        $latestPosts =Post::latest()
//            ->skip(1) // Skip the latest 10 posts
//            // Get the next 10 posts (or adjust as needed)
//            ->paginate(15);
        $mostViewedPost = Post::orderBy('views', 'desc')->first();
        $mostViewedPostID =optional(Post::orderBy('views', 'desc')->first())->id;

        $recommendedPosts = Post::orderBy('views', 'desc')->take(3)->where('id','!=',$mostViewedPostID)->get();

//        dd($mostViewedPosts);

        return view('website.home',compact('recommendedPosts','mostViewedPost','adminInfo','categories','latestPostCreated','latestPosts'));
    }
    public function categories($category)
    {
        $posts=Post::where('category', $category)->paginate(10);
        return view('website.post_category',compact('posts','category'));
    }

    public function about(){
        $adminInfo=AdminInfo::all()->first();
        $categories=Category::all();
        $social_links=SocialMediaAccount::all();


        return view('website.about',compact('adminInfo','categories','social_links'));
    }
  public function contact(){
      $adminInfo=AdminInfo::all()->first();

        return view('website.contact',compact('adminInfo'));
    }

    public function post_detail($id)
    {
        $post=Post::find($id);
        $post->increment('views');
//        dd($id);
        $commints= DB::table('comments')
            ->where('post_id', $id)->get();
        $commints_count= DB::table('comments')
            ->where('post_id', $id)->count();
        $modeLike= DB::table('likes')
            ->where('likeable_id', $id)->get();

        $shareComponent=\Share::page(route('admin.post_detail',$post->id), '$post->title')
            ->facebook()
            ->twitter()
            ->linkedin('Extra linkedin summary can be passed here')
            ->whatsapp();


        return view('website.post_detail',compact('post','shareComponent', 'commints','commints_count','modeLike'));
    }

}
