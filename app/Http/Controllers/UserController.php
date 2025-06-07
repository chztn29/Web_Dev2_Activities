<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    public function createNewUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:55',
            'email' => 'required',
            'password' => 'required|max:20'
        ]);

        $addNew = new User();
        $addNew->name = $request->name;
        $addNew->email = $request->email;
        $addNew->password = $request->password;
        $addNew->save();

        return back()->with('success', 'User added successfully!');
    }

    public function update(User $users, Request $request){
        $data = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required',
            'password' => 'required|max:20'
        ]);

        $users->update($data);

        return back()->with('success', 'User Updated Successfully');

    }

    public function delete(User $users){
        $users->delete();
        return back()->with('success', 'User Deleted Successfully');
    }

}
