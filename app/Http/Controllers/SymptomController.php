<?php

namespace App\Http\Controllers;

use App\Symptom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SymptomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function index()
    {
        //TODO
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        Log::debug('SymptomController index(): Auth::user()-> is checkin =='.Auth::user()->is_checked_in);
        if($currentuser->is_checked_in == 1) {
            return view('symptoms',$this->getStatData() );
        }else {
            Log::debug('SymptomController:  return redirect()->route(checkin)');
            return redirect()->route('checkin');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        request()->validate([
            'temprature' => 'required',
            'cough' => 'required',
            'breath' => 'required',
            'muscle' => 'required',
            'sorethroat'=> 'required',
            'diarrea'=> 'required',
        ]);

        $fever = $request->temprature;
        $cough = $request->cough;
        $breathShortness = $request->breath;
        $musclePain = $request->muscle;
        $sorethroat = $request->sorethroat;
        $diarrea = $request->diarrea;

        $symptom = new Symptom();
        $symptom->user_id = Auth::user()->id;
        $symptom->ip = $request->ip();
        $symptom->latitude = $request->latitude;
        $symptom->longitude = $request->longitude;
        //LOCATION IP == 1;
        $symptom->location = $request->position;

        $symptom->temp = $fever;
        $symptom->cough = $cough;
        $symptom->breathShortness = $breathShortness;
        $symptom->musclePain = $musclePain;
        $symptom->sorethroat = $sorethroat;
        $symptom->diarrea = $diarrea;
        $symptom->save();

        $coranastage = round((float)(($breathShortness*3)+($fever*3)+($cough*2)+($musclePain)+$sorethroat+$diarrea)/11);
        //$coranastage =$breathShortness * 3;

        $user = Auth::user();
        $user->corona_stage = $coranastage;
        $user->save();

        return redirect()->action('SymptomsMapController@myPosition' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function show(Symptom $symptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function edit(Symptom $symptom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Symptom $symptom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symptom $symptom)
    {
        //
    }

    public function senddiagnose(Request $request){




    }
    private function getStatData(){
        Log::debug('SymptomController getStatData()');


        return ['patient_confirmed' => User::where('corona_stage', 4)->count(),
            'patient_heavy_symptoms' => User::where('corona_stage', 3)->count(),
            'patient_light_symptoms' => User::where('corona_stage', 2)->count(),
            'patient_no_symptoms' => User::where('corona_stage', 1)->count()];
    }
}
