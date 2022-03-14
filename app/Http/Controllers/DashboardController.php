<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Fishpond;
use App\Models\Temperature;
use App\Models\TempSensor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    function dump() {
        //var_dump(DB::table('tempSensor')->get());
        echo '<br><br><br>';
        var_dump(TempSensor::get());
    }

    function index() {
        $data = fishpond::all()->load('latestTemperature');
        $tempSensor = TempSensor::getLatest();
        if ($tempSensor->first() != null) {
            
            $data = [$data, $tempSensor];
        } else {
            $data = [$data, null];
        }
        return Inertia::render('Dashboard', [
            'data' => $data,
        ]);
    }
}
