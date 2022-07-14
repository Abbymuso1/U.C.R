<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();

        $holland = DB::table('hollandcode')
            ->join('course', 'course.id', '=', 'hollandcode.course_id')
            ->select('hollandcode.*')
            ->get();
        $subject = DB::table('subject')
            ->join('course', 'course.id', '=', 'subject.course_id')
            ->select('subject.*')
            ->get();

        $grade = DB::table('grades')
            ->join('subject', 'subject.id', '=', 'grades.subject_id')
            ->select('grades.*')
            ->get();

        $university = DB::table('university')
            ->join('grades', 'grades.id', '=', 'university.grade_id')
            ->select('university.*')
            ->get();

        $interest = DB::table('interest')
            ->join('hollandcode', 'hollandcode.id', '=', 'interest.holland_id')
            ->select('interest.*')
            ->get();

        $data = [
            'course' => $course,
            'holland' => $holland,
            'subject' => $subject,
            'grade' => $grade,
            'university' => $university,
            'interest' => $interest
        ];

        Log::info('The course are being viewed by the admin');

        return view('admin.course', $data);
    }

    public function store(Request $request)
    {
        $Course = new Course;
        $Course->course_name = $request->input('course_name');
        $Course->created_at = now();
        $Course->save();

        return redirect('admin/course');
    }


    public function update(Request $request, $id)
    {
        $Course = Course::find($id);
        $Course->course_name = $request->input('course_name');
        $Course->updated_at = now();
        $Course->update();
        return redirect('admin/course');
    }

    public function delete(Request $request)
    {

        $data = $request->input('data')['course'];
        $subject = Course::find($data);
        $subject->delete();
        $request->session()->flash('success', 'Course has been successfully deleted');
    }
}
