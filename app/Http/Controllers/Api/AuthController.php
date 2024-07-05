<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'       => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password'        => 'required|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'All field are required',
                    'error'   => $validator->messages(),
                ], 401);
            }

            $user = User::create([
                'name'       => $request->name,
                'email' => $request->email,
                'password'        => $request->password
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token'   => $user->createToken("Api token")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // Login
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'All login field are required',
                    'error'   => $validator->messages(),
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Email & password does not match',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            return response()->json([
                'status'  => true,
                'message' => 'User logged in successfully',
                'token'   => $user->createToken("Api token")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // profile
    public function profile(){
        $user = auth()->user();
        return response()->json([
            'status'  => true,
            'message' => 'Profile information',
            'data'   => $user
        ], 200);
    }

    // logout
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'status'  => true,
            'message' => 'User logged out',
            'data'   => []
        ], 200);
    }
}
