<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register (Request $request){
        $userExists = User::where('email', '=', $request['email'])->first();

        if($userExists == null){
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);

            $user = User::create(
            [
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]
            );

            $token = $user->createToken($request->nameToken)->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token,
            ];

            return response($response, 201);

        } else {
            return response()->json([
                'message' => 'User already exists',
                ], 404
            );
        }

    }

    public function login (Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Email ou senha inválidos',
            ],401);
        }

        $token = $user->createToken('UsuarioLogado')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

}
