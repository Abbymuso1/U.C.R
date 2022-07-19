<?php

namespace App\Http\Controllers;
use App\Models\UserInterest;

use Illuminate\Http\Request;

class UserInterestController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        // $interest=new UserInterest();
        // $interest->user_id = $request->input('user_id');
        // $interest->course_id = $request->input('course_id');
        // $interest->holland_id = $request->input('holland_id');
        // $interest->interest_id = $request->input('interest_id');
        // $interest->answer = $request->input('int_ans');
        // $interest->created_at = now();
        // $interest->save();
        // return redirect('usercourse');
    }
}
