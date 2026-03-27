<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ✅ Register
    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'reset_code' => null
        ]);

        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);
    }

    // ✅ Login
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => $user
        ]);
    }

    // ✅ Forgot Password (generate reset_code)
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        $user->reset_code = rand(100000, 999999); // OTP
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Reset code generated',
            'reset_code' => $user->reset_code 
        ]);
    }

    // ✅ Reset Password
    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'reset_code' => 'required',
            'new_password' => 'required|min:6'
        ]);

        $user = User::where('email', $data['email'])
                    ->where('reset_code', $data['reset_code'])
                    ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid reset code'
            ], 400);
        }

        $user->password = Hash::make($data['new_password']);
        $user->reset_code = null; // clear code
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password reset successful'
        ]);
    }
}