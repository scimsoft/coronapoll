<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class SymptomsMapController extends MapController
{
    //
    protected $heatmap_points = [];

    public function index()
    {

    }

    public function myPosition()
    {
        //$this->createHeatMapDataPointsConfirmed();
        $id = Auth::user()->id;
        $myLatitude = $this->lastSymptom($id)->latitude;
        $myLongitude = $this->lastSymptom($id)->longitude;
        return view('map', ['zoomlevel' => '14', 'maxzoomlevel' => '18', 'latitude' => $myLatitude, 'longitude' => $myLongitude, 'dataPoints' => $this->createHeatMapFromSymptoms($myLatitude, $myLongitude, 0)]);
    }

    private function lastSymptom(int $id)
    {
        return DB::table('symptoms')->where('user_id', $id)->latest('id')->first();
    }

    private function createHeatMapFromSymptoms(float $lang, float $long, int $radios)
    {
        $startLang = $lang - 0.05;
        $endLang = $lang + 0.05;
        $startLong = $long - 0.05;
        $endLong = $long + 0.05;
        //TODO solo las ultimas symptoms
        $symptomDataRange = DB::table('symptoms')->get();
//            ->whereBetween('latitude',[$startLang,$endLang])
//            ->whereBetween('longitude',[$startLong,$endLong])
//            ->get();


        foreach ($symptomDataRange as $symptomDataPoint) {
            $breathShortness = $symptomDataPoint->breathShortness;
            $fever = $symptomDataPoint->temp;
            $cough = $symptomDataPoint->cough;
            $musclePain = $symptomDataPoint->musclePain;
            $coranastage = round((float)(($breathShortness * 3) + ($fever * 3) + ($cough * 2) + ($musclePain)) / 9);
            array_push($this->heatmap_points, [
                $symptomDataPoint->longitude,
                $symptomDataPoint->latitude,
                $coranastage,
                1
            ]);
        }
        return $this->heatmap_points;
    }

    protected function createHeatMapDataPointsConfirmed()
    {
        $csv = array_map('str_getcsv', file('externaldata/03-27-2020.csv'));
        foreach ($csv as $csvline) {
            array_push($this->heatmap_points, [
                $csvline[6],
                $csvline[5],
                3,
                $csvline[7]*10
            ]);


            }
        }


    private function getUserData()
    {
        $user = Auth::user();
        return $user;
    }

    private function getStatData()
    {
        return [
            'patient_confirmed' => User::where('corona_stage', 3)->count(),
            'patient_heavy_symptoms' => User::where('corona_stage', 4)->count(),
            'patient_light_symptoms' => User::where('corona_stage', 5)->count(),
            'patient_no_symptoms' => User::where('corona_stage', 6)->count()
        ];
    }
}
