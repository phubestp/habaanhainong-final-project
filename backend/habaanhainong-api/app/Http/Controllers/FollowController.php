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
        return response()->json(['is_success' => true, 'message' => 'FollowController[getAll]: Follows all', 'data' => Follow::all()]);
    }

    //GET /follows/get/user/{user_id}
    public function getFollowsByUser($user_id)
    {
        return response()->json(['is_success' => true, 'message' => 'FollowController[getFollowsByUser]: Follows found', 'data' => Follow::where('user', $user_id)->get()]);
    }

    //GET /follows/get/post/{post_id}
    public function getFollowsByPost($post_id)
    {
        return response()->json(['is_success' => true, 'message' => 'FollowController[getFollowsByPost]: Follows found', 'data' => Follow::where('post', $post_id)->get()]);
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
            return response()->json(['is_success' => false, 'message' => 'FollowController[add]: Post not found', 'data' => null]);
        }

        //verify that the user exists
        $user = User::find($request->get('user'));
        if (!$user) {
            return response()->json(['is_success' => false, 'message' => 'FollowController[add]: User not found', 'data' => null]);
        }

        //verify that the follow doesn't already exist
        $follow = Follow::where('post', $post->id)->where('user', $user->id)->first();
        if ($follow) {
            return response()->json(['is_success' => false, 'message' => 'FollowController[add]: Follow already exists', 'data' => null]);
        }

        //create the follow
        $follow = new Follow();
        $follow->post = $post->id;
        $follow->user = $user->id;
        $follow->save();

        return response()->json(['is_success' => true, 'message' => 'FollowController[add]: Follow created', 'data' => $follow]);
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
            return response()->json(['is_success' => false, 'message' => 'FollowController[delete]: Post not found', 'data' => null]);
        }

        //verify that the user exists
        $user = User::find($request->get('user'));
        if (!$user) {
            return response()->json(['is_success' => false, 'message' => 'FollowController[delete]: User not found', 'data' => null]);
        }

        //verify that the follow exists
        $follow = Follow::where('post', $post->id)->where('user', $user->id)->first();
        if (!$follow) {
            return response()->json(['is_success' => false, 'message' => 'FollowController[delete]: Follow not found', 'data' => null]);
        }

        //delete the follow
        $follow->delete();

        return response()->json(['is_success' => true, 'message' => 'FollowController[delete]: Follow deleted', 'data' => $follow]);
    }


}
