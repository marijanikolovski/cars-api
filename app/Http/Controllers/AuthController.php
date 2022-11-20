<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                "status" => 'error',
                "message" => "Unauthorised"
            ], 401);
        };

        return response()->json(
            [
                "status" => "success",
                "user" => Auth::user(),
                "authorization" => [
                    "token" => $token,
                ]
            ]
        );
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            "name" => $validatedData['name'],
            "email" => $validatedData['email'],
            "password" => Hash::make($validatedData['password'])
        ]);

        $token = auth()->login($user);

        return response()->json([
            "status" => "success",
            "user" => $user,
            "authorization" => [
                "token" => $token
            ]
        ]);
    }

    public function refresh(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            "authorization" => [
                "token" => Auth::refresh(),
            ]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
