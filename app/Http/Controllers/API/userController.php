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
    // public function updateName(userRequest $request, string $id)
    // {
    //     //
    //     $user = User::findOrFail($id);

    //     $validated = $request->validated();

    //     $user->name = $validated['name'];

    //     $user->save();

    //     return $user;
    // }

       /**
     * Update the specified resource in storage.
     */
    // public function updateEmail(userRequest $request, string $id)
    // {
    //     //
    //     $user = User::findOrFail($id);

    //     $validated = $request->validated();

    //     $user->email = $validated['email'];

    //     $user->save();

    //     return $user;
    // }


     /**
     * Update the specified resource in storage.
     */
    public function update(userRequest $request, string $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validated();

    if (isset($validated['name'])) {
        $user->name = $validated['name'];
    }

    if (isset($validated['email'])) {
        $user->email = $validated['email'];
    }

    if (isset($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

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
