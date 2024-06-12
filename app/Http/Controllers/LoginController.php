<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(LoginRequest $request)
    {
        $user = User::create($request->validated());

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Register failed',
            ], 400);
        }

        $token = $user->createToken('WishListToken')->plainTextToken;

        return response()->json([
            'status' => 1,
            'message' => 'Register success',
            'data' => $user,
            'token' => $token,
        ], 201);
    }

    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function login(LoginRequest $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 1,
                'message' => 'Login success',
                'token' => $request->user()->createToken('WishListToken')->plainTextToken
            ], 200);
        }

        return response()->json([
            'status' => -1,
            'message' => 'Unauthenticated',
        ], 401);
    }

    public function logout(Request $request){
        if ($request->user()->currentAccessToken()->delete()) {
            return response()->json([
                'status' => 1,
                'message' => 'Logout success',
            ], 200);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Logout error',
        ], 401);
    }
}
