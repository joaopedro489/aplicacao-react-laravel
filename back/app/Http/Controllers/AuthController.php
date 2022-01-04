<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AuthController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt(['email' => request('login'), 'password' => request('password')])) {
            return AuthController::successLogin();
        } else if (Auth::attempt(['cpf' => request('login'), 'password' => request('password')])){
            return AuthController::successLogin();
        } else if (Auth::attempt(['pis' => request('login'), 'password' => request('password')])){
            return AuthController::successLogin();
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    private static function successLogin(){
        $user = Auth::user();
        $success['token'] = $user -> createToken('MyApp')->accessToken;
        return response()->json(['token' => $success["token"]], 200);
    }
    public static function logout()
    {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json([
            "message" => "Logout realizado com sucesso!",
        ], 200);
    }

    public function me()
    {
        $user = Auth::user();
        $user->address;
        $user->address->state;
        return response()->json($user);
    } 
}
