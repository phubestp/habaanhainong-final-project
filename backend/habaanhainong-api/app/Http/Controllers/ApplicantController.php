<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
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

        $exist = Applicant::where('post_id', $post_id)->where('username', $username)->first();
        if($exist != null) {
            abort(400, "คุณได้ขอรับเลี้ยงสัตว์ตัวนี้แล้ว");
        }

        $applicant = new Applicant();
        $applicant->username = $username;
        $applicant->post_id = $post_id;
        $applicant->reason = $reason;
        $applicant->save();

        return $applicant;
    }

    public function getApplicants(String $post_id) {
        $applicants = Applicant::where('post_id', $post_id)->get();
        return $applicants;
    }
}
