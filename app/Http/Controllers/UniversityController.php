<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\University;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UniversityController extends Controller
{


    public function store(Request $request)
    {
        $University = new University;
        $University->grade_id = $request->input('grade_id');
        $University->university_name = $request->input('university_name');
        $University->university_type = $request->input('university_type');
        $University->created_at = now();
        $University->save();

        return redirect('admin/course');
    }

    public function update(Request $request, $id)
    {
        $University = University::find($id);
        $University->university_name = $request->input('university_name');
        $University->university_type = $request->input('university_type');
        $University->update();
        return redirect('admin/course');
    }

    public function delete(Request $request)
    {

        $data = $request->input('data')['class3'];
        $uni = University::find($data);
        $uni->delete();
        $request->session()->flash('success', 'University successfully deleted');
    }


}
