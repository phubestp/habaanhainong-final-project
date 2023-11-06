<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //Get /follows/get
    public function getAll()
    {
        return Follow::all();
    }

    //GET /follows/get/user/{user_id}
    public function getFollowsByUser($user_id)
    {
        return Follow::where('user', $user_id)->get();
    }

    //GET /follows/get/post/{post_id}
    public function getFollowsByPost($post_id)
    {
        return Follow::where('post', $post_id)->get();
    }

    //POST /follows/add
    public function add(Request $request)
    {
        //verify that the follow data is present
        $validatedData = $request->validate([
            'post' => 'required',
            'user' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post'));
        if (!$post) {
            return null;
        }

        //verify that the user exists
        $user = User::find($request->get('user'));
        if (!$user) {
            return null;
        }

        //verify that the follow doesn't already exist
        $follow = Follow::where('post', $post->id)->where('user', $user->id)->first();
        if ($follow) {
            return null;
        }

        //create the follow
        $follow = new Follow();
        $follow->post = $post->id;
        $follow->user = $user->id;
        $follow->save();

        return $follow;
    }

    //DELETE /follows/delete
    public function delete(Request $request)
    {
        //verify that the follow data is present
        $validatedData = $request->validate([
            'post' => 'required',
            'user' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post'));
        if (!$post) {
            return null;
        }

        //verify that the user exists
        $user = User::find($request->get('user'));
        if (!$user) {
            return null;
        }

        //verify that the follow exists
        $follow = Follow::where('post', $post->id)->where('user', $user->id)->first();
        if (!$follow) {
            return null;
        }

        //delete the follow
        $follow->delete();

        return $follow;
    }


}
