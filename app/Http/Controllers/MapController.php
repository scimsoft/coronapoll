<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MapController extends Controller
{
    //


    public function index()
    {

    }
    public function myPosition(){
        $id = Auth::user()->id;
        $myLatitude = $this->lastSymptom($id)->latitude;
        $myLongitude=$this->lastSymptom($id)->longitude;
        return view('map',['latitude' => $myLatitude,'longitude' => $myLongitude,'dataPoints' => $this->createHeatmapDataPoints($myLatitude,$myLongitude,0)]);
    }

    private function lastSymptom(int $id){
        return DB::table('symptoms')->where('user_id',$id)->latest('id')->first();
    }

    private function createHeatmapDataPoints(float $lang,float $long, int $radios){
        $startLang = $lang-0.05;
        $endLang = $lang+0.05;
        $startLong = $long-0.05;
        $endLong = $long+0.05;
        //TODO solo las ultimas symptoms
        $symptomDataRange = DB::table('symptoms')->get();
//            ->whereBetween('latitude',[$startLang,$endLang])
//            ->whereBetween('longitude',[$startLong,$endLong])
//            ->get();



        $heatmap_points = [];
        foreach ($symptomDataRange as $symptomDataPoint){
            array_push($heatmap_points, [
                $symptomDataPoint->latitude,
                $symptomDataPoint->longitude
            ]);
        }
        return $heatmap_points;
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
