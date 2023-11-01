<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function editProfile(Request $request, String $username) {
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $phone_no = $request->get('phone_no');
        $facebook = $request->get('facebook');
        $instagram = $request->get('instagram');
        $line = $request->get('line');

        $user = User::where('username', $username)->first();
        $user->firstname = $firstname;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->phone_no = $phone_no;
        $user->facebook = $facebook;
        $user->instagram = $instagram;
        $user->line = $line;
        $user->save();
        $user->refresh();
        return $user;
    }
}
