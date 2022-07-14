<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {

        // dd($request);
        feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        Log::alert('Feedback has been given by '.$request->name);

        return redirect('/');
    }

    public function destroy($id)
    {
        $user = feedback::find($id);
        $user->delete();
        Log::alert('Feedback has been deleted');

        return redirect('admin');
    }
}
