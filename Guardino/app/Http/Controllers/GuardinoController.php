<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Sensor;

class GuardinoController extends Controller
{
    /**
     * create a new controller instance
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
        $sensors = Sensor::All();

        return view('guardino', compact('sensors'));
    }

    /**
     * Returns all of the sensor data as json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        
    }


}
