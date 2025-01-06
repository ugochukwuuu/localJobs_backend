<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);



        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $newUser = new User();

            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->save();
            
            $token = JWTAuth::fromUser($newUser);  
            return response()->json([
                'code'=>'0',
                'message' => 'User created successfully',
                'user' => $newUser,
                'token' => $token
            ], 201);
        }
        return response()->json([
            'message' => 'User already exists. Please log in to continue.'
        ], 400);
    }
}