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
        return response()->json(['is_success' => true, 'message' => 'UserController[getAll]: Users all', 'data' => User::all()]);
    }

    //GET /user/get/id/{id}
    public function getFromId($id){
        return response()->json(['is_success' => true, 'message' => 'UserController[getFromId]: User found', 'data' => User::find($id)]);
    }

    //GET /user/get/username/{username}
    public function getFromUsername($username){
        return response()->json(['is_success' => true, 'message' => 'UserController[getFromUsername]: User found', 'data' => User::where('username', $username)->first()]);
    }

    //GET /user/get/email/{email}
    public function getFromEmail($email){
        return response()->json(['is_success' => true, 'message' => 'UserController[getFromEmail]: User found', 'data' => User::where('email', $email)->first()]);
    }

    //GET /user/get/post/{post_id}
    public function getUserByPost(Post $post){
        return response()->json(['is_success' => true, 'message' => 'UserController[getUserByPost]: User found', 'data' => $post->author]);
    }

    //GET /user/get/reporter/{report_id}
    public function getReporterByReport(Report $report){
        return response()->json(['is_success' => true, 'message' => 'UserController[getReporterByPost]: User found', 'data' => $report->reporter]);
    }

    //GET /user/get/reported/{report_id}
    public function getReportedUserByReport(Report $report){
        return response()->json(['is_success' => true, 'message' => 'UserController[getReportedUserByPost]: User found', 'data' => $report->reported_user]);
    }

    //GET /user/get/banned-by/{banned_user}
    public function getBannedByUser(BannedUser $banned_user){
        return response()->json(['is_success' => true, 'message' => 'UserController[getBannedByUser]: User found', 'data' => $banned_user->by_user]);
    }

    //GET /users/get/following-post/{post_id}
    public function getUsersFollowingPost(Post $post){
        $users = [];
        foreach($post->follows as $follow){
            $users = array_merge($users, User::where('id', $follow->user)->get()->toArray());
        }
        return response()->json(['is_success' => true, 'message' => 'UserController[getFollowingPost]: Users found', 'data' => $users]);
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
            return response()->json(['is_success' => false, 'message' => 'UserController[add]: User already exists', 'data' => ""]);
        }

        //create the user
        $user = new User();
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        return response()->json(['is_success' => true, 'message' => 'UserController[add]: User created', 'data' => $user]);
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
            return response()->json(['is_success' => false, 'message' => 'UserController[saveWithId]: User not found', 'data' => ""]);
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
            return response()->json(['is_success' => false, 'message' => 'UserController[save]: User not found', 'data' => ""]);
        }

        //save the user
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        return response()->json(['is_success' => true, 'message' => 'UserController[save]: User saved', 'data' => $user]);
    }

    //DELETE /users/delete/{id}
    public function deleteWithId($id){
        //verify that the user exists
        $user = User::find($id);
        if(!$user){
            return response()->json(['is_success' => false, 'message' => 'UserController[deleteWithId]: User not found', 'data' => ""]);
        }

        //delete the user
        $user->delete();

        return response()->json(['is_success' => true, 'message' => 'UserController[deleteWithId]: User deleted', 'data' => ""]);
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
            return response()->json(['is_success' => false, 'message' => 'UserController[delete]: User not found', 'data' => ""]);
        }

        //delete the user
        $user->delete();

        return response()->json(['is_success' => true, 'message' => 'UserController[delete]: User deleted', 'data' => ""]);
    }

    //PUT /admin/add/{user_id}
    public function addAdmin($user_id){
        //verify that the user exists
        $user = User::find($user_id);
        if(!$user){
            return response()->json(['is_success' => false, 'message' => 'UserController[addAdmin]: User not found', 'data' => ""]);
        }

        //add the admin
        $user->isAdmin = true;
        $user->save();

        return response()->json(['is_success' => true, 'message' => 'UserController[addAdmin]: Admin added', 'data' => $user]);
    }

    //PUT /admin/remove/{user_id}
    public function removeAdmin($user_id){
        //verify that the user exists
        $user = User::find($user_id);
        if(!$user){
            return response()->json(['is_success' => false, 'message' => 'UserController[removeAdmin]: User not found', 'data' => ""]);
        }

        //remove the admin
        $user->isAdmin = false;
        $user->save();

        return response()->json(['is_success' => true, 'message' => 'UserController[removeAdmin]: Admin removed', 'data' => $user]);
    }

}
