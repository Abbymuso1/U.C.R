<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class SubjectController extends Controller
{

    public function store(Request $request)
    {
        $Subject = new Subject;
        $Subject->course_id = $request->input('course_id');
        $Subject->subject_name = $request->input('subject_name');
        $Subject->created_at = now();
        $Subject->save();

        return redirect('admin/course');
    }

    public function update(Request $request, $id)
    {
        $Subject = Subject::find($id);
        $Subject->course_id = $request->input('sub_id');
        $Subject->subject_name = $request->input('subject_name');
        $Subject->updated_at =now();
        $Subject->update();
        return redirect('admin/course');
    }

    public function destroy($id)
    {
        $Subject = Subject::find($id);
        $Subject->delete();
        return redirect('admin/subject');
    }


}
