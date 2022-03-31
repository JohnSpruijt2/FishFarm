<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fishpond;
use App\Models\Temperature;
use App\Models\TempSensor;
use App\Models\Dangerzone;

class DashboardController extends Controller
{
    //
    function index() {
        $data = fishpond::all()->load('latestTemperature')->load('latestOxygenLevel');
        $temperatureDangerzone = Dangerzone::where('data_type', 'temperature')->get();

        return Inertia::render('Dashboard', [
            'data' => $data,
            'temperatureDangerzone' => $temperatureDangerzone,
        ]);
    }
}
