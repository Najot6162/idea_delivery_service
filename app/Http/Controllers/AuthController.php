<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Bad Request'
            ], 400);
        }
        $credentials = request(['phone', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Unauthorized'
            ], 404);
        }

        $user = User::where('phone', $request->phone)->first();
        $tokenResult = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'token' => $tokenResult,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
            if ($request->user()->fcm_token) {
                $user = User::findOrFail($request->user()->id);
                $user->fcm_token = null;
                $user->save();
            }
        }
        return response()->json([
            'message' => 'Token and FCM Token deleted successfully'
        ]);
    }
}
