<?php

namespace App\Http\Controllers;

use App\Models\BannedUser;
use App\Models\User;
use Illuminate\Http\Request;

class BannedUserController extends Controller
{
    //GET /banned_users/get
    public function getAll()
    {
        return BannedUser::all();
    }

    //GET /banned_user/get/banned/{user_id}
    public function getBannedUser($user_id)
    {
        $user = User::find($user_id);
        return BannedUser::where('banned_user', $user)->first();
    }

    //POST /banned_users/add
    public function add(Request $request)
    {
        // validate request
        $request->validate([
            'banned_user' => 'required',
            'by_user' => 'required',
            'ban_reason' => 'required',
            'ban_at' => 'required',
        ]);

        // create new banned user
        $banned_user = new BannedUser([
            'banned_user' => $request->get('banned_user'),
            'from_report' => $request->get('from_report'),
            'by_user' => $request->get('by_user'),
            'ban_reason' => $request->get('ban_reason'),
            'ban_at' => $request->get('ban_at'),
        ]);

        // save new banned user
        $banned_user->save();

        return $banned_user;
    }

    //DELETE /banned_users/delete/{user_id}
    public function deleteWithId($user_id)
    {
        $user = User::find($user_id);
        $banned_user = BannedUser::where('banned_user', $user)->first();
        $banned_user->delete();
        return $banned_user;
    }

    //DELETE /banned_users/delete
    public function delete(Request $request)
    {
        // validate request
        $request->validate([
            'banned_user' => 'required',
        ]);

        $user = User::find($request->get('banned_user'));
        $banned_user = BannedUser::where('banned_user', $user)->first();
        $banned_user->delete();
        return $banned_user;
    }

}
