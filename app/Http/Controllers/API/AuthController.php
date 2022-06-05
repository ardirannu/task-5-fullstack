<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAuth;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
       /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(ValidateAuth $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
   
        return response()->json([
            'type' =>'success',
            'message' => 'User register successfully.', 
            'data' => [
                'token' => $user->createToken('MyApp')->accessToken,
                'name' => $user->name,
            ]
        ]);
    }

      /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            return response()->json([
                'type' =>'success',
                'message' => 'User login successfully.', 
                'data' => [
                    'token' => $user->createToken('MyApp')->accessToken,
                    'name' => $user->name,
                ]
            ]);
        } 
        else{ 
            return  response()->json([ 
                'type' =>'errors',
                'message' => 'Failed Login.',  
            ], 401);
        } 
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
            'type' =>'success',
            'message' => 'You have been successfully logged out!', 
        ]);
    }
}
