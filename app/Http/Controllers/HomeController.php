<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Code here
        if (Auth::user()->is_checked_in) {
            return view('home',$this->getStatData() );
        } else {
            return view('checkin');
        }


    }

    private function getStatData(){
        return ['patient_confirmed' => User::where('corona_stage', 3)->count(),
            'patient_heavy_symptoms' => User::where('corona_stage', 4)->count(),
            'patient_light_symptoms' => User::where('corona_stage', 5)->count(),
            'patient_no_symptoms' => User::where('corona_stage', 6)->count()];
}
    public function userdata(Request $request){
//        $newUser                  = Auth()::user();
//        $newUser->is_checked_in            = 1;
//
//        $newUser->save();
        $user = Auth::user();
        $user->age = $request->age;
        if($request->cofirmed =1)$user->corona_stage = 1;
        $user->is_checked_in = 1;
        $user->save();


        return view('home',$this->getStatData() );
    }

    public function checkin()
    {
        // Code here

        return view('checkin');


    }
}
