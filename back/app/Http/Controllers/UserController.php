<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $creds = $request->only(['name', 'email', 'password', 'cpf', 'pis']);
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cpf'=> 'min:11|max:11',
            'pis' => 'min:0|max:11'
        ];
        $validator = Validator::make($creds, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User();
        $creds["password"] = bcrypt($creds['password']);
        $user = $user->create($creds);
        $request["user_id"] = $user->id;

        $address = AddressController::store($request);

        return response()->json([
            'user'=> $user,
            'address' => $address
        ], 200);
    }
    public function update(Request $request){
        $user = auth()->user();
        $creds = $request->only(['name', 'email', 'password', 'cpf', 'pis']);
        $rules = [
            'cpf'=> 'min:0|max:11',
            'pis' => 'min:0|max:11'
        ];
        $validator = Validator::make($creds, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user->update($creds);
        $request["user_id"] = $user->id;

        $address = AddressController::update($request);
        
        return response()->json([
            'user'=> $user,
            'address' => $address
        ], 200);
    }
    public function delete(){
        $user = Auth::user();
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        User::destroy($user->id);
        return response()->json('', 204);
    }
}
