<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialAccountController extends Controller
{

    private $user;
    public function __construct(SocialAccount $user)
    {

        Config::set('jwt.user', SocialAccount::class);

        Config::set('auth.providers', ['users' => [
            'driver' => 'eloquent',
            'model' => SocialAccount::class,
        ]]);

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
