<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use DB;

class RegionController extends Controller
{
    public function getCountries(){
        $countries = DB::table('countries')->orderby('countries.name', 'asc')->get();
        return $countries;
    }
    public function getCountryByState($state_id){
        $country = DB::table('countries')
                        ->join('states', 'states.country_id', '=', 'countries.id')
                        ->where('states.id', $state_id)
                        ->select('countries.*')
                        ->first();
        return response()->json($country, 200);
    }
    public function getStates(){
        $states = DB::table('states')->orderby('states.name', 'asc')->get();
        return $states;
    }
    public function getStatesByCountry($country_id){
        $states = DB::table('states')
                    ->join('countries', 'states.country_id', '=', 'countries.id')
                    ->where('countries.id', $country_id)
                    ->select('states.*')
                    ->orderBy('states.name', 'asc')
                    ->get();
        return response()->json($states, 200);
    }
}
