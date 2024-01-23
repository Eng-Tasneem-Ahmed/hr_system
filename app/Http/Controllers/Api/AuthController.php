<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return responseErrorMessage(['message' => " incorrect username or password"], 401);
        }
        $user = Auth::user();
        $user['token'] = $user->createToken('auth_token')->plainTextToken;
        return responseSuccessData([
            "user" => new UserResource($user),
            "token" => $user['token'],
            'token_type' => 'Bearer',
        ]);
    }

    public function logout()
    {
       Auth::user()->currentAccessToken()->delete();
        return responseSuccessMessage('logged out successfully');
    }
}
