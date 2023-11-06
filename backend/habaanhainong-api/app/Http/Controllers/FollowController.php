<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;

class FollowController extends Controller
{
    public function follow(String $username, String $post_id) {
        $follow = new Follow();
        $follow->post = $post_id;
        $follow->user = $username;
        $follow->save();
        return $follow;
    }

    public function unfollow(String $username, String $post_id)
    {
        $follow = Follow::where('user', $username)->where('post', $post_id)->first();
        $follow->delete();
    }

    public function getFollowPosts(String $username)
    {
        $follow = Follow::where('username', $username);
        return $follow->post;
    }

    public function getFollowersCount(String $post_id) {
        $follow = Follow::where('post', $post_id);
        return response()->json([
            'count' => $follow->count()
        ]);
    }

    public function isFollow(String $username, String $post_id) {
        $isFollow = false;
        $exist = Follow::where('user', $username)->where('post', $post_id)->first();
        if($exist !== null) {
            $isFollow = true;
        }

        return response()->json([
            'isFollow' => $isFollow
        ]);
    }

}
