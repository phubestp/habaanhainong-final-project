<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(String $username, String $post_id) {
        $user = User::where('username', $username)->first();

        $user->post()->attach($post_id);
        return $user->posts;
    }

    public function unfollow(String $username, String $post_id)
    {
        $user = User::where('username', $username)->first();

        $user->post()->detach($post_id);
        return $user->post;
    }

    public function getFollowPosts(String $username)
    {
        $user = User::where('username', $username)->first();
        return $user->post;
    }

    public function getFollowersCount(String $post_id) {
        $post = Post::where('id', $post_id)->first();
        return response()->json([
            'count' => $post->user->count()
        ]);
    }

    public function isFollow(String $username, String $post_id) {
        $isFollow = false;
        $post = Post::where('id', $post_id)->first();
        $exist = $post->user->where('username', $username)->first();
        if($exist !== null) {
            $isFollow = true;
        }

        return response()->json([
            'isFollow' => $isFollow
        ]);
    }

}
