<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [
            'users' => $users
        ];
        Log::info('The users are being viewed by the admin');

        return view('admin.user.index', $data);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('usertype');
        $user->email_verified_at = now();
        
        $user->password = Hash::make($request->input('password'));
        $user->current_team_id = 1;
        $user->created_at = now();
        $user->save();

        return redirect('admin/user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('usertype');
        $user->update();
        return redirect('admin/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user');
    }

    public function searchUser(Request $request)
    {
        $user = Auth::User()->id;

        $searchQuest = $request->input("searchQuest");

        $data = [
            "users" => DB::table('users')
                ->where("name", "like", "$searchQuest%")
                ->orWhere("email", "like",  "$searchQuest%")
                ->orWhere("user_type", "like",  "$searchQuest%")
                ->groupBy('users.id')
                ->select('users.id', 'users.name', 'users.email', 'users.user_type')
                ->get()
        ];

        return view('admin.user-search', $data);
    }
}
