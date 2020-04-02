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

        } else {
            return view('checkin');
        }


    }






}
