<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request) {
        $username = $request->get('username');
        $post_id = $request->get('post_id');

        $user = User::where('username', $username)->first();

        $user->posts()->attach($post_id);
        return $user->posts;
    }

    public function unfollow(Request $request)
    {
        $username = $request->get('username');
        $post_id = $request->get('post_id');

        $user = User::where('username', $username)->first();

        $user->posts()->detach($post_id);
        return $user->posts;
    }

    public function getFollowPosts(String $username)
    {
        $user = User::where('username', $username)->first();
        return $user->posts;
    }
}
