<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MapController extends Controller
{
    //


    public function index()
    {

    }
    public function myPosition(){
        $user = Auth::user();
        return view('map',['latitude' => $user->symptoms()->first()->latitude,'longitude'=>$user->symptoms()->first()->longitude]);
    }


    private function getUserData(){
        $user = Auth::user();
        return $user;
    }

    private function getStatData(){
        return ['patient_confirmed' => User::where('corona_stage', 3)->count(),
            'patient_heavy_symptoms' => User::where('corona_stage', 4)->count(),
            'patient_light_symptoms' => User::where('corona_stage', 5)->count(),
            'patient_no_symptoms' => User::where('corona_stage', 6)->count()];
    }
}
