<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Doctor;
use App\Models\Notice;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function index(){
        $post=Post::all();

        return response($post,200,['ok']);
    }
    public function doctors(){
      $doctors=Doctor::all();
      return response($doctors,200,['ok']);
  }
  public function notices(){
    $notices=Notice::all();
    return response($notices,200,['ok']);
}

}
