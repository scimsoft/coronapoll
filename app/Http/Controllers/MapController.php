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
        return view('map',['zoomlevel'=>'14','maxzoomlevel'=>'22','latitude' => $myLatitude,'longitude' => $myLongitude,'dataPoints' => $this->createHeatmapDataPoints($myLatitude,$myLongitude,0)]);
    }

    public function generalView(){
//        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//        $acceptLang = ['es', 'en', 'nl'];
//        $lang = in_array($lang, $acceptLang) ? $lang : 'en';
//        app()->call('App\Http\Controllers\LanguageController@switchLang', [$lang]);
        return view('map',['zoomlevel'=>'2','maxzoomlevel'=>'4','latitude' => '40.409120', 'longitude' => '-3.704954','dataPoints' => $this->createGeneralHetamap()]);


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
            $breathShortness =$symptomDataPoint->breathShortness;
            $fever=$symptomDataPoint->temp;
            $cough=$symptomDataPoint->cough;
            $musclePain=$symptomDataPoint->musclePain;
            $coranastage = round((float)(($breathShortness*3)+($fever*3)+($cough*2)+($musclePain))/9);
            array_push($heatmap_points, [
                $symptomDataPoint->longitude,
                $symptomDataPoint->latitude,

                $coranastage,
            ]);
        }
        return $heatmap_points;
    }

    private function createGeneralHetamap(){
        $openmapdata =[];
        $openmapdata = config('opendata.opendata');
        return $openmapdata;

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
