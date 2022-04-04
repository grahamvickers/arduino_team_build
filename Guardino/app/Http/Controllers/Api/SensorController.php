<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sensor;

class SensorController extends Controller
{
    /**
     * Store sensor data to the Sensor table in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req-> validate([
            'gas' => 'required|numeric|between:0,100',
            'moisture' => 'required|numeric|between:0,100',
            'temperature' => 'required|numeric|between:0,100',
            'light' => 'required|numeric|between:0,100'
        ]);

        $today = now();

        $sensorAll = Sensor::All();

        $sensorNum = count($sensorAll);

        if ($sensorNum == 0) {
            Sensor::create([
                'gas' => $req->gas,
                'moisture' => $req->moisture,
                'temperature' => $req->temperature,
                'light' => $req->light
            ]);
        } else {
            $sensor = Sensor::orderBy('created_at',  'DESC')
            ->get()
            ->first();

            $sensorDate = date_create($sensor->created_at);

    
            $result = date_diff($today, $sensorDate);

            if ($result->d >= 1) {
                Sensor::create([
                    'gas' => $req->gas,
                    'moisture' => $req->moisture,
                    'temperature' => $req->temperature,
                    'light' => $req->light
                ]);
            } else {
                
            }
        }
       
        


        
    }
}
