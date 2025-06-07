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
            'password' => 'required|max:20',
        ]);

        $addNew = new User();
        $addNew->name = $request->name;
        $addNew->email = $request->email;
        $addNew->password = $request->password;
        $addNew->save();

        return back()->with('success', 'User added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

}
