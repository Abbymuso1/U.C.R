<?php

namespace App\Http\Controllers;

use App\Models\GradeEntry;

use Illuminate\Http\Request;

class GradeEntryController extends Controller
{
    public function store(Request $request)
    {
     
        $Grade = new GradeEntry();
        $Grade->user_id = $request->input('user');
        $Grade->mathematics = $request->input('mathematics');
        $Grade->english = $request->input('english');
        $Grade->swahili = $request->input('swahili');
        $Grade->science = $request->input('chemistry');
        $Grade->humanity = $request->input('science');

        $totalpoints = $request->input('mathematics') + $request->input('english') + $request->input('swahili') + $request->input('science') + $request->input('chemistry');
        $Grade->totalpoints = $totalpoints;
        $average=$totalpoints/5;
        $Grade->average = $average;

        $Grade->created_at = now();
        $Grade->save();
        return redirect('user-entry');
    }
}
