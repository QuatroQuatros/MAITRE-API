<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request){
        $request->validate([
            "email" => 'required|string',
            "password" => 'required|string'
        ]);



        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('JWT')->plainTextToken;
            $response =[
                "user" => $user,
                "token" => $token
            ];

            return response()->json($response, 200);
    
        }else{
            return response()->json(['message' => "usuario invalido"], 401);
        }
    }

    public function register(Request $request){
        $request->validate([
            "name" => "required|string",
            "email" => "required|string|unique:users,email",
            "password" => "required|string|confirmed"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $response =[
            'user' => $user,
        ];

        return response($response, 201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(["message" => "sessão encerrada"]);
    }
}
