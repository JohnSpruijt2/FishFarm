<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Fishpond;
use App\Models\Temperature;
use App\Models\TempSensor;

class DashboardController extends Controller
{
    //
    function index() {
        $data = fishpond::all()->load('latestTemperature');
        $tempSensor = TempSensor::getLatest();
        $data = [$data, $tempSensor];
        return Inertia::render('Dashboard', [
            'data' => $data,
        ]);
    }
}
