<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        DB::table('comments')->insert([
            'content' => $request->input('content'),
            'post_id'=> $id,
            'user_id'=>Auth::id(),
            'name'=>auth()->user()->name,
            'email'=>auth()->user()->email,
            'created_at' => now() // Or any specific date
        ]);

//        $post->comments()->create([
//            'content' => $request->input('content'),
//            'user_id' => auth()->id(),
//        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function delete_commint($id)
    {
        $category=Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Comment has been successfully Deleted!');

    }
}
