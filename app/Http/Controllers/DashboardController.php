<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DangerWarning;
use App\Models\Fishpond;

class DashboardController extends Controller
{
    //
    function index(Request $request) {
        $data = fishpond::all()->load('dangerzones')->load('latestTemperature')->load('latestOxygenLevel')->load('latestTurbidityLevel')->load('latestWaterLevel');
        /*foreach ($data as $key) {
            foreach ($key->dangerzone as $dangerzone) {
                if ($dangerzone->data_type == 'temperature') {
                    if ($key->latestTemperature->temperature > $dangerzone->max) {
                        Mail::to($request->user())->send(new DangerWarning($key, 'temperature'));
                    } else if ($key->latestTemperature->temperature < $dangerzone->min){
                        Mail::to($request->user())->send(new DangerWarning($key, 'temperature'));
                    }
                } else if ($dangerzone->data_type == 'oxygen') {
                    if ($key->latestOxygenLevel->oxygen_level > $dangerzone->max) {
                        Mail::to($request->user())->send(new DangerWarning($key, 'oxygen'));
                    } else if ($key->latestOxygenLevel->oxygen_level < $dangerzone->min){
                        Mail::to($request->user())->send(new DangerWarning($key, 'oxygen'));
                    }
                } else if ($dangerzone->data_type == 'turbidity') {
                    if ($key->latestTurbidityLevel->ntu > $dangerzone->max) {
                        Mail::to($request->user())->send(new DangerWarning($key, 'turbidity'));
                    } else if ($key->latestTurbidityLevel->ntu < $dangerzone->min){
                        Mail::to($request->user())->send(new DangerWarning($key, 'turbidity'));
                    }
                } else if ($dangerzone->data_type == 'level') {
                    if ($key->latestWaterLevel->cm > $dangerzone->max) {
                        Mail::to($request->user())->send(new DangerWarning($key, 'level'));
                    } else if ($key->latestWaterLevel->cm < $dangerzone->min){
                        Mail::to($request->user())->send(new DangerWarning($key, 'level'));
                    }
                }
            }
            
        }
        */
        return Inertia::render('Dashboard', [
            'data' => $data,
        ]);
    }
}
