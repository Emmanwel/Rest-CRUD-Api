<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //

    public function index()
    {
        return response()->json(User::get());
    }

    //Shows the form for creating a New User
    public function create()
    {
        //
    }

    //Store a newly created user into the database
    public function store(Request $request)
    {
        $validated = $this->validateUser($request);

        User::create($validated);

        return response()->json('success');
    }


    //Display a specific User

    public function show(User $user)
    {
        //
    }

    //Show the form for editing the user details

    public function edit(User $user)
    {
        return response()->json($user);
    }

    //Update the specified resource

    public function update(Request $request, User $user)
    {
        $validated = $this->validateUser($request);

        $user->update($validated);

        return response()->json('success');
    }
    //Deletion
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('success');
    }

    protected function validateUser($request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }
}
