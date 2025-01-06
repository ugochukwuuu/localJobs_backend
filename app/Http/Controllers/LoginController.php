<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => "User doesn't exist"
            ], 404);
        }
        elseif (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => "The password is incorrect"
                ], 401);
            }
            $token = JWTAuth::fromUser($user);  
        return response()->json([
            'message' => 'User logged in successfully',
            'code'=> 0,
            'user' => $user,
            'token'=> $token
        ], 200);
    }
}
