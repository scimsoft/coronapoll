<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

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
        return view('home',['patient_confirmed' => Patient::where('status', 3)->count(),
            'patient_heavy_symptoms' => Patient::where('status', 4)->count(),
            'patient_light_symptoms' => Patient::where('status', 5)->count(),
            'patient_no_symptoms' => Patient::where('status', 6)->count()]);
    }
}
