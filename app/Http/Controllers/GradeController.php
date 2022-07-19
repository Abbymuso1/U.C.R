<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class GradeController extends Controller
{

    public function store(Request $request)
    {
        $Grade = new Grade;
        $Grade->subject_id = $request->input('subject_id');
        $Grade->grade = $request->input('grade_name');
        $Grade->score = $request->input('grade_score');
        $Grade->created_at = now();
        $Grade->save();
        return redirect('admin/course');
    }


    public function update(Request $request, $id)
    {
        $Grade = Grade::find($id);
        $Grade->grade = $request->input('grade_name');
        $Grade->score = $request->input('grade_score');
        $Grade->update();
        return redirect('admin/course');
    }

    public function delete(Request $request)
    {

        $data = $request->input('data')['class2'];
        $holland= Grade::find($data);
        $holland->delete();
        $request->session()->flash('success', 'Grade successfully deleted');
        
    }

}
