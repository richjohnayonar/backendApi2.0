<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Requests\userRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    
    /**
     * login using the specified resource.
     */
    public function login(userRequest $request)
    {
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'user'  => $user,
            'token' =>  $user->createToken($request->email)->plainTextToken
        ];
     
        return response($response, 200);
    }
    public function logout(userRequest $request)
    {
        //
        return false;
    }
}
