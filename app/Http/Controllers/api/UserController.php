<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
        $user = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['token' => $token], Response::HTTP_OK);
    }

    public function getUserInfo(Request $request)
    {

        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}