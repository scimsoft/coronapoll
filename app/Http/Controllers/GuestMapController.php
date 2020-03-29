<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Session;

class GuestMapController extends MapController
{
    //
    public function generalView(){
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return view('map',['zoomlevel'=>'2','maxzoomlevel'=>'4','latitude' => '40.409120', 'longitude' => '-3.704954','dataPoints' => $this->createGeneralHetamap()]);


    }
    private function createGeneralHetamap(){
        $openmapdata =[];
        $openmapdata = config('opendata.opendata');
        return $openmapdata;

    }
}
