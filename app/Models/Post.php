<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }


    public function dislikes()
    {
        return $this->morphMany(Like::class, 'likeable')->where('is_like', false);
    }

//    public function userLike()
//    {
//        return $this->morphOne(Like::class, 'likeable')->where('is_like', true);
//    }
//
//    public function userDislike()
//    {
//        return $this->morphOne(Like::class, 'likeable')->where('is_like', false);
//    }
    public function userLike()
    {
        return $this->morphOne(Like::class, 'likeable')->where('is_like', 1);
    }

    public function userDislike()
    {
        return $this->morphOne(Like::class, 'likeable')->where('is_like', 0);
    }
}
