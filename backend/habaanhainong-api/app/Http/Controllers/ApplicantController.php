<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Enums\ApplicantStatus;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ApplicantController extends Controller
{
    public function applicant(Request $request)
    {
        $username = $request->get('username');
        $post_id = $request->get('post_id');
        $reason = $request->get('reason');

        $exist = Applicant::where('post', $post_id)->where('user', $username)->first();
        if($exist != null) {
            abort(400, "คุณได้ขอรับเลี้ยงสัตว์ตัวนี้แล้ว");
        }

        $applicant = new Applicant();
        $applicant->user = $username;
        $applicant->post = $post_id;
        $applicant->reason = $reason;
        $applicant->save();

        return $applicant;
    }

    public function getApplicants(String $post_id) {
        $applicants = Applicant::where('post', $post_id)->get();
        return $applicants;
    }

    public function accept(Request $request)
    {
        $username = $request->get('username');
        $post_id = $request->get('post_id');

        $exist = Applicant::where('post', $post_id)->where('user', $username)->first();
        if ($exist != null) {
            abort(400, "คุณได้ขอรับเลี้ยงสัตว์ตัวนี้แล้ว");
        }

        $applicant = Applicant::where('post', $post_id)->where('user', $username)->first();
        $applicant->user = $username;
        $applicant->post = $post_id;
        $applicant->status = ApplicantStatus::ADOPTED;
        $applicant->save();

        return $applicant;
    }
}
