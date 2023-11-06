<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Enums\ApplicantStatus;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    //GET /applicants/get
    public function getAll()
    {
        return response()->json(['is_success' => true, 'message' => 'ApplicantController[getAll]: Applicants all', 'data' => Applicant::all()]);
    }

    //GET /applicants/get/post/{post_id}
    public function getApplicantsByPost($post_id)
    {
        $post = Post::find($post_id);
        return response()->json(['is_success' => true, 'message' => 'ApplicantController[getApplicantsByPost]: Applicants found', 'data' => Applicant::where('post', $post)->get()]);
    }

    //GET /applicants/get/user/{user_id}
    public function getApplicantsByUser($user_id)
    {
        $user = User::find($user_id);
        return response()->json(['is_success' => true, 'message' => 'ApplicantController[getApplicantsByUser]: Applicants found', 'data' => Applicant::where('applicant', $user)->get()]);
    }

    //GET /applicants/get/status-list
    public function getStatusList(){
        $statusList = [ApplicantStatus::REJECTED, ApplicantStatus::WAITING, ApplicantStatus::CONTACTING, ApplicantStatus::ADOPTED, ApplicantStatus::TRUSTWORTHY];
        return response()->json(['is_success' => true, 'message' => "ApplicantController[getStatusList]: getStatusList", 'data' => $statusList]);
    }

    //GET /applicants/get/if-applied
    public function isApplied(Request $request){
        //verify that the applicant data is present
        $validatedData = $request->validate([
            'post' => 'required',
            'applicant' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post'));
        if (!$post) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[isApplied]: Post not found', 'data' => $request]);
        }

        //verify that the applicant exists
        $applicant = User::find($request->get('applicant'));
        if (!$applicant) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[isApplied]: Applicant not found', 'data' => $request]);
        }

        //check if the applicant has applied for this post
        $applied = Applicant::where('post', $post)->where('applicant', $applicant)->first();

        return response()->json(['is_success' => true, 'message' => "ApplicantController[isApplied]: isApplied", 'data' => $applied]);
    }

    //POST /applicants/add
    public function add(Request $request)
    {
        //verify that the applicant data is present
        $validatedData = $request->validate([
            'post' => 'required',
            'applicant' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post'));
        if (!$post) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[add]: Post not found', 'data' => $request]);
        }

        //verify that the applicant exists
        $applicant = User::find($request->get('applicant'));
        if (!$applicant) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[add]: Applicant not found', 'data' => $request]);
        }

        //if there is already an applicant that status == ApplicantStatus::ADOPTED for this post, then reject this applicant
        if (Applicant::where('post', $post)->where('status', ApplicantStatus::ADOPTED)->first()){
            $validatedData['status'] = ApplicantStatus::REJECTED;
            return response()->json(['is_success' => false,
                'message' => 'ApplicantController[add]: Applicant rejected because there is already an adopted applicant for this post',
                'data' => $applicant]
            );
        }

        //create the applicant
        $applicant = Applicant::create($validatedData);

        return response()->json(['is_success' => true, 'message' => 'ApplicantController[add]: Applicant created', 'data' => $applicant]);
    }

    //PUT /applicants/save
    public function save(Request $request)
    {
        //verify that the applicant data is present
        $validatedData = $request->validate([
            'post' => 'required',
            'applicant' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post'));
        if (!$post) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[save]: Post not found', 'data' => $request]);
        }

        //verify that the applicant exists
        $applicant = User::find($request->get('applicant'));
        if (!$applicant) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[save]: Applicant not found', 'data' => $request]);
        }

        //verify that the applicant exists
        $applicant = Applicant::where('post', $post)->where('applicant', $applicant)->first();
        if (!$applicant) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[save]: Applicant not found', 'data' => $request]);
        }

        //update the applicant
        $applicant->update($validatedData);

        //if this applicant is being set to ADOPTED, then set all other applicants in the same post to REJECTED
        if ($applicant->status == ApplicantStatus::ADOPTED){
            $applicants = Applicant::where('post', $applicant->post)->get();
            foreach ($applicants as $otherApplicant){
                if ($otherApplicant->applicant != $applicant->applicant){
                    $otherApplicant->status = ApplicantStatus::REJECTED;
                    $otherApplicant->save();
                }
            }
        }

        return response()->json(['is_success' => true, 'message' => 'ApplicantController[save]: Applicant updated', 'data' => $applicant]);
    }

    //DELETE /applicants/delete
    public function delete(Request $request)
    {
        //verify that the applicant data is present
        $validatedData = $request->validate([
            'post' => 'required',
            'applicant' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post'));
        if (!$post) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[delete]: Post not found', 'data' => $request]);
        }

        //verify that the applicant exists
        $applicant = User::find($request->get('applicant'));
        if (!$applicant) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[delete]: Applicant not found', 'data' => $request]);
        }

        //verify that the applicant exists
        $applicant = Applicant::where('post', $post)->where('applicant', $applicant)->first();
        if (!$applicant) {
            return response()->json(['is_success' => false, 'message' => 'ApplicantController[delete]: Applicant not found', 'data' => $request]);
        }

        //delete the applicant
        $applicant->delete();

        return response()->json(['is_success' => true, 'message' => 'ApplicantController[delete]: Applicant deleted', 'data' => $applicant]);
    }

}
