<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserApiController extends Controller
{

    //
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
      
        if ($validator->fails()){
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('username', $request->username)->first();
        
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('pA6Ycu74a18xe9xaijnJhxLfkXzOxE9YpWIhJiJ0')->accessToken;
                $response = [
                        "codigo" => "0",
                        "mensaje" => "Usuario autenticado satisfactoriamente!",
                        "results" => array(
                            "token_type" => "Bearer", 
                            "expires_in" => session_get_cookie_params(),
                            'access_token' => $token,
                            "refresh_token" => ""
                        )
                    ];
                return response($response, 200);
            } else {
                $response = ["codigo" => "1", "mensaje" => "Error => Verifica tu usuario o contraseña!", "restuls" => []];
                return response($response, 422);
            }
        } else {
            $response = ["codigo" => "1", "mensaje" =>'Error => Usuario no existe!', "restuls" => []];
            return response($response, 422);
        }
    }

    //
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }

    //
    public function logout(Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
