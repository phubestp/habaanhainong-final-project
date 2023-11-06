<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(String $username, String $post_id) {
        $user = User::where('username', $username)->first();

        $user->posts()->attach($post_id);
        return $user->posts;
    }

    public function unfollow(String $username, String $post_id)
    {
        $user = User::where('username', $username)->first();

        $user->posts()->detach($post_id);
        return $user->posts;
    }

    public function getFollowPosts(String $username)
    {
        $user = User::where('username', $username)->first();
        return $user->posts;
    }

    public function getFollowersCount(String $post_id) {
        $post = Post::where('id', $post_id)->first();
        return response()->json([
            'count' => $post->users->count()
        ]);
    }

    public function isFollow(String $post_id, String $username) {
        $isFollow = false;
        $post = Post::where('id', $post_id)->first();
        $exist = $post->users->where('username', $username)->first();
        if($exist !== null) {
            $isFollow = true;
        }

        return response()->json([
            'isFollow' => $isFollow
        ]);
    }

}
