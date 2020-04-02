<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckInController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkin()
    {
        // Code here
        Log::debug('return check in view: ');
        return view('checkin');
    }

    public function userdata(Request $request){

        Log::debug('entering userdata ');
        $user = Auth::user();
        $user->age = $request->age;
        if($request->cofirmed == 1){$user->corona_stage = 4;}else{$user->corona_stage = 1;}
        $user->is_checked_in = 1;
        $user->riskgroup = $request->riskgroup;
        $user->save();
        Log::debug('saved userdata ');

        Log::debug('CheckinController: is checkin =='.Auth::user()->is_checkin_in);
        return redirect()->action('SymptomController@index' );

    }
}
