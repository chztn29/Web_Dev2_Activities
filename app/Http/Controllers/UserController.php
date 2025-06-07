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

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    public function update(User $user, Request $request){
        $data = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email',
            'password' => 'nullable|max:20'
        ]);
    
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // don’t update password if left blank
        }
    
        $user->update($data);
    
        return back()->with('success', 'User Updated Successfully');
    }
    


    public function delete(User $user){
        $user->delete();
        return back()->with('success', 'User Deleted Successfully');
    }

}
