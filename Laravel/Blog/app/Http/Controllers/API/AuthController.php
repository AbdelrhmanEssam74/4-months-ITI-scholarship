<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'username' => request('username'),
//            'profile_image' => request('profile_image'),
            'password' => bcrypt(request('password')),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login()
    {
        $user = User::where('email', request('email'))->first();
        if (!$user || !password_verify(request('password'), $user->password)) {
            return response()->json(['message ' => 'Wrong Email or Password'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
