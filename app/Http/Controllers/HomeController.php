<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Symptom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function redirect;

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
    public function about()
    {
        return view('about');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Code here

        Log::debug('checked in'.Auth::user()->is_checked_in);
        if (Auth::user()->is_checked_in = 1) {
            return view('home',$this->getStatData() );
        } else {
            return view('checkin');
        }


    }

    private function getStatData(){
        return ['patient_confirmed' => User::where('corona_stage', 4)->count(),
            'patient_heavy_symptoms' => User::where('corona_stage', 3)->count(),
            'patient_light_symptoms' => User::where('corona_stage', 2)->count(),
            'patient_no_symptoms' => User::where('corona_stage', 1)->count()];
}
    public function userdata(Request $request){

        $user = Auth::user();
        $user->age = $request->age;
        if($request->cofirmed =1)$user->corona_stage = 1;
        $user->is_checked_in = 1;
        $user->riskgroup = $request->riskgroup;
        $user->save();

        return redirect()->action('HomeController@index',$this->getStatData() );

    }
    public function senddiagnose(Request $request){

        request()->validate([
            'temprature' => 'required',
            'cough' => 'required',
            'breath' => 'required',
            'muscle' => 'required',
        ]);

        $fever = $request->temprature;
        $cough = $request->cough;
        $breathShortness = $request->breath;
        $musclePain = $request->muscle;

        $symptom = new Symptom();
        $symptom->user_id = Auth::user()->id;
        $symptom->ip = $request->ip();
        $symptom->latitude = $request->latitude;
        $symptom->longitude = $request->longitude;

        $symptom->temp = $fever;
        $symptom->cough = $cough;
        $symptom->breathShortness = $breathShortness;
        $symptom->musclePain = $musclePain;
        $symptom->save();

        $coranastage = round((float)(($breathShortness*3)+($fever*3)+($cough*2)+($musclePain))/9);
        //$coranastage =$breathShortness * 3;

        $user = Auth::user();
        $user->corona_stage = $coranastage;
        $user->save();

        return redirect()->action('SymptomsMapController@myPosition' );


    }

    public function checkin()
    {
        // Code here

        return view('checkin');


    }
}
