<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request){

        $request->authenticate();


        $token = $request->user()->createToken('myToken');

       return response()->json(
           [
               'success' =>true,
               'message'=>'Logged in',
               'data'=> [
                   'user'=> $request->user(),
                   'token'=> $token->plainTextToken
               ]
           ]
        );
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
       return [
           'message' => 'logged out'
       ];
    }

    public function register(Request $request){

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['telephone'],
            'password' => Hash::make($fields['password'])
        ]);


        $token = $user->createToken('appToken')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

}
