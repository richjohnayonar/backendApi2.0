<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(userRequest $request)
    {
        //
        $validated = $request -> validated();
        $validated['password']= Hash::make($validated['password']);
        $user = User::create($validated);
        $user -> update($validated);
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(userRequest $request, string $id)
    {
        //
        $validated = $request -> validated();
        $user = User::findOrFail($id);
        $user -> update($validated);
        
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
 
        $user->delete();

        return $user;
    }
}
