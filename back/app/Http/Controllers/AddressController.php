<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public static function  store(Request $request){
        $creds = $request->only(['state_id', 'municipality', 'cep', 'street', 'number', 'complement', 'user_id']);
        $rules = [
            'state_id' => 'required|exists:states,id',
            'municipality' => 'required',
            'number' => 'required|integer',
            'cep'=> 'required|min:0|max:8',
            'street' => 'required',
            'user_id' => 'required|exists:users,id'
        ];
        $validator = Validator::make($creds, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $address = new Address();
        $address = $address->create($creds);
        
        return $address;
    }

    public static function update(Request $request){
        $creds = $request->only(['state_id', 'municipality', 'cep', 'street', 'number', 'complement', 'user_id']);
        $rules = [
            'number' => 'integer',
            'cep'=> 'min:0|max:8',
            'user_id' => 'exists:users,id'
        ];
        $validator = Validator::make($creds, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $address = Address::where('user_id', $creds['user_id'])->first();
        $address->update($creds);
        
        return $address;
    }
}
