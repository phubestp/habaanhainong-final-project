<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //GET /reports/get
    public function getAll()
    {
        return Report::all();
    }

    //GET /reports/get/reporter/{user_id}
    public function getReportsByReporter($user_id)
    {
        $user = User::find($user_id);
        return Report::where('reporter', $user)->get();
    }

    //GET /reports/get/reported/{user_id}
    public function getReportsByReported($user_id)
    {
        $user = User::find($user_id);
        return Report::where('reported', $user)->get();
    }

    //GET /reports/get/post/{post_id}
    public function getReportsByPost($post_id)
    {
        $post = Post::find($post_id);
        return Report::where('from_post', $post)->get();
    }

    //GET /report/get/id/{id}
    public function getFromId($id)
    {
        return Report::find($id);
    }

    //POST /reports/add
    public function add(Request $request)
    {
        // validate request
        $request->validate([
            'reporter' => 'required',
            'reported' => 'required',
            'report_reason' => 'required',
            'report_at' => 'required',
        ]);

        // create new report
        $report = new Report([
            'reporter' => $request->get('reporter'),
            'reported' => $request->get('reported'),
            'from_post' => $request->get('from_post'),
            'report_reason' => $request->get('report_reason'),
            'report_at' => $request->get('report_at'),
        ]);

        // save report
        $report->save();

        // return response
        return $report;
    }

    //DELETE /reports/delete/{id}
    public function deleteWithId($id)
    {
        // find report
        $report = Report::find($id);

        // delete report
        $report->delete();

        // return response
        return $report;
    }

    //DELETE /reports/delete
    public function delete(Request $request)
    {
        // validate request
        $request->validate([
            'id' => 'required'
        ]);

        // find report
        $report = Report::find($request->get('id'));

        // delete report
        $report->delete();

        // return response
        return $report;
    }


}
