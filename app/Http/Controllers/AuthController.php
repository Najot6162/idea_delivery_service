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
        $validator = Validator::make($request->all(),[
            'login'=> 'required',
            'password' =>'required'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status_code'=>400,
                'message'=>'Bad Request'
            ]);
        }
        $credentials = request(['login','password']);

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status_code'=>500,
                'message'=>'Unauthorized'
            ]);
        }
 
        $user = User::where('login',$request->login)->first();

        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message'=>$tokenResult
        ]);
    }
    public function logout(Request $request)
    {
        if($request->user()){
            $request->user()->tokens()->delete();
        }
        // Auth::logout();
        // // $request->user()->currentAccessToken()->delete();
        return response() ->json([
            'message' => 'Token deleted successfully'
        ]);
    }
}
