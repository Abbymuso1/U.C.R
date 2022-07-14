<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holland;

class HollandController extends Controller
{
    public function store(Request $request)
    {
        $holland=new Holland;
        $holland->course_id = $request->input('course_id');
        $holland->holland_name = $request->input('holland_name');
        $holland->created_at=now();
        $holland->save();
        return redirect('admin/course');
    }

    public function update(Request $request, $id)
    {
        $holland = Holland::find($id);
        $holland->course_id = $request->input('hol_id');
        $holland->holland_name = $request->input('holland_name');
        $holland->updated_at = now();
        $holland->update();
        return redirect('admin/course');
    }

    public function delete(Request $request)
    {

        $data = $request->input('data')['personality'];
        $holland= Holland::find($data);
        $holland->delete();
        $request->session()->flash('success', 'Holland Personality successfully deleted');
       
    }
}
