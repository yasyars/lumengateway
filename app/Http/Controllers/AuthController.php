<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register(Request $request){
        $name = $request->name;
        $username= $request->username;
        $password = Hash::make($request->password);
        
        $register = User::create([
            'name' => $name,
            'username' => $username,
            'password' => $password 
        ]);

        if ($register){
            return response()->json([
                'success'=> true,
                'message'=> 'Register success',
                'data'=> $register
            ],201);
        }else{
            return response()->json([
                'success'=> false,
                'message'=>'Register fail',
                'data'=>'no data'
            ],400); 
        }
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username',$username)->first();
        
        if (Hash::check($password,$user->password)){
            $apiToken = base64_encode(str_random(40));

            $user->update([
                'api_token' => $apiToken
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Login Success',
                'data' => [
                    'user' => $user,
                    'api_token' => $apiToken
                ]
                ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Login Fail',
                'data' => ''
                ]);
        }

    }
    
}
