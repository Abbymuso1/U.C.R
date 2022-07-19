<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Interest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Holland;


class InterestController extends Controller
{
   
    public function store(Request $request)
    {
        $interest=new Interest;
        $interest->holland_id = $request->input('holland_id');
        $interest->question = $request->input('interest_desc');
        $interest->score= $request->input('interest_score');
        $interest->created_at = now();
        $interest->save();
        return redirect('admin/course');
    }

    public function update(Request $request, $id)
    {
        $interest = Interest::find($id);
        $interest->id = $request->input('interest_id');
        $interest->question = $request->input('interest_q');
        $interest->score = $request->input('interest_score');
        $interest->updated_at=now();
        $interest->update();
        return redirect('admin/course');
    }

    public function delete(Request $request)
    {

        $data = $request->input('data')['interest'];
        $interest= Interest::find($data);
        $interest->delete();
        $request->session()->flash('success', 'Interest question successfully deleted');
       
    }

}
