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

    public function getFollowersCount(Post $post) {
        return response()->json([
            'count' => $post->users()->count()
        ]);
    }

    public function isFollow(Post $post, User $user) {
        $isFollow = false;
        $exist = $post->users()->where('username', $user->username);
        if($exist !== null) {
            $isFollow = true;
        }

        return response()->json([
            'isFollow' => $isFollow
        ]);
    }

}
