<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LikeController extends Controller
{
    //


    public function likeOrDislike(Request $request)
    {
        $likeableType = 'App\Models\\' . ucfirst($request->likeable_type); // Dynamic model class
        $likeable = $likeableType::findOrFail($request->likeable_id);

        $existingLike = $likeable->likes()->where('user_id', Auth::id())->first();

        if ($existingLike) {
            if ($existingLike->is_like == $request->is_like) {
                // If the user is toggling the same action (like/dislike), remove the like/dislike
                $existingLike->delete();
            } else {
                // Otherwise, update the existing record to the opposite action
                $existingLike->update(['is_like' => $request->is_like]);
            }
        } else {
            // If no existing like/dislike, create a new one
            $likeable->likes()->create([
                'user_id' => Auth::id(),
                'is_like' => $request->is_like,
            ]);
        }

        // Correctly count likes and dislikes
        $likesCount = $likeable->likes()->where('is_like', true)->count();
        $dislikesCount = $likeable->likes()->where('is_like', false)->count();
        $userLike = DB::table('likes')
            ->where('likeable_id', $request->likeable_id)->where('user_id', auth()->id())->get();

        return response()->json([
            'likes_count' => $likesCount,
            'dislikes_count' => $dislikesCount,
        ]);
    }


//    public function toggleLike(Request $request, Post $post)
//    {
//        $like = $post->likes()->where('user_id', auth()->id())->first();
//
//        if ($like) {
//            // If the user has already liked/disliked, toggle it
//            $like->is_like = !$like->is_like;
//            $like->save();
//        } else {
//            // Otherwise, create a new like record
//            $post->likes()->create([
//                'user_id' => auth()->id(),
//                'is_like' => $request->input('is_like', true),
//            ]);
//        }
//
//        return back()->with('success', 'Your preference has been recorded.');
//    }
}
