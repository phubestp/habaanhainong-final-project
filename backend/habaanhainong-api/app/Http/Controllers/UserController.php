<?php

namespace App\Http\Controllers;

use App\Models\BannedUser;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //GET /users/get
    public function getAll(){
        return User::all();
    }

    //GET /user/get/id/{id}
    public function getFromId($id){
        return User::find($id);
    }

    //GET /user/get/username/{username}
    public function getFromUsername($username){
        return User::where('username', $username)->first();
    }

    //GET /user/get/email/{email}
    public function getFromEmail($email){
        return User::where('email', $email)->first();
    }

    //GET /user/get/post/{post_id}
    public function getUserByPost(Post $post){
        return $post->author;
    }

    //GET /user/get/reporter/{report_id}
    public function getReporterByReport(Report $report){
        return $report->reporter;
    }

    //GET /user/get/reported/{report_id}
    public function getReportedUserByReport(Report $report){
        return $report->reported_user;
    }

    //GET /user/get/banned-by/{banned_user}
    public function getBannedByUser(BannedUser $banned_user){
        return $banned_user->by_user;
    }

    //GET /users/get/following-post/{post_id}
    public function getUsersFollowingPost(Post $post){
        $users = [];
        foreach($post->follows as $follow){
            $users = array_merge($users, User::where('id', $follow->user)->get()->toArray());
        }
        return $users;
    }

    //POST /users/add
    public function add(Request $request){
        //verify that the post data is present
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //verify that the user doesn't already exist
        $user = User::where('username', $request->get('username'))->first();
        if($user){
            return $user;
        }

        //create the user
        $user = new User();
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        return $user;
    }

    //PUT /users/save/{id}
    public function saveWithId(Request $request, $id)
    {
        //verify that the post data is present
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
        ]);

        //verify that the user exists
        $user = User::find($id);
        if(!$user){
            return null;
        }

//        Schema::create('users', function (Blueprint $table) {
//            $table->uuid('id')->primary();
//            $table->string('username')->nullable()->unique();
//            $table->string('email')->unique();
//            $table->string('password');
//            $table->string('firstname');
//            $table->string('lastname');
//            $table->boolean('isAdmin')->default(false);
//            $table->string('phone_no');
//            $table->string('Facebook')->nullable();
//            $table->string('Instagram')->nullable();
//            $table->string('Line')->nullable();
//            $table->timestamps();
//        });

        //save the user
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->phone_no = $request->get('phone_no');
        $user->Facebook = $request->get('Facebook');
        $user->Instagram = $request->get('Instagram');
        $user->Line = $request->get('Line');
        $user->save();

        return $user;
    }

    //PUT /users/save
    public function save(Request $request){
        //verify that the post data is present
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //verify that the user exists
        $user = User::where('username', $request->get('username'))->first();
        if(!$user){
            return null;
        }

        //save the user
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        return $user;
    }

    //DELETE /users/delete/{id}
    public function deleteWithId($id){
        //verify that the user exists
        $user = User::find($id);
        if(!$user){
            return null;
        }

        //delete the user
        $user->delete();

        return null;
    }

    //DELETE /users/delete
    public function delete(Request $request){
        //verify that the post data is present
        $validatedData = $request->validate([
            'username' => 'required',
        ]);

        //verify that the user exists
        $user = User::where('username', $request->get('username'))->first();
        if(!$user){
            return null;
        }

        //delete the user
        $user->delete();

        return null;
    }

    //PUT /admin/add/{user_id}
    public function addAdmin($user_id){
        //verify that the user exists
        $user = User::find($user_id);
        if(!$user){
            return null;
        }

        //add the admin
        $user->isAdmin = true;
        $user->save();

        return $user;
    }

    //PUT /admin/remove/{user_id}
    public function removeAdmin($user_id){
        //verify that the user exists
        $user = User::find($user_id);
        if(!$user){
            return null;
        }

        //remove the admin
        $user->isAdmin = false;
        $user->save();

        return $user;
    }

}
