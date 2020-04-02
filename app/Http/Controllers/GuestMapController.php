<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Session;

class GuestMapController extends Controller
{
    //
    public function index(){
        $this->setSessionLanguage();
        return view('map',[
            'zoomlevel'=>'2',
            'maxzoomlevel'=>'4',
            'latitude' => '40.409120',
            'longitude' => '-3.704954',
            'dataPoints' => $this->getGuestHeatMap()
        ]);


    }
    private function getGuestHeatMap(){
        $openmapdata = config('opendata.opendata');
        return $openmapdata;


    }

    public function setSessionLanguage()
    {
        Log::debug('entering in Language detection');
        if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            Log::debug('Language detected: '.$lang);
        } else {
            $lang = 'en';
        }

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
    }
}
