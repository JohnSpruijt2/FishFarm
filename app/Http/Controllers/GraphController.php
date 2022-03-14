<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\TempSensor;
use App\Models\Fishpond;

class GraphController extends Controller
{
    //
    function index(Request $request) {
        if ($request->type = 'temperature') {
            return $this->showTemperatureGraph($request);
        } else {
            return redirect('/details/'.$request->id.'/temperature');
        }
        
    }

    function showTemperatureGraph($request) {
        if ($request->id == 'sensor') {
            $data = TempSensor::getLast60();
            if ($data->first() == null) {
                return redirect('/dashboard');
            }
            $times = [];
            $temperatures = [];
            
            for ($i=count($data); $i > 0; $i--) { 
                array_push($temperatures, $data[$i-1]->value);
            }
            $name = 'Fishpond Sensor';

        } else if (is_numeric($request->id)) {
            $data = Temperature::orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
            if ($data->first() == null) {
                return redirect('/dashboard');
            }
            $times = [];
            $temperatures = [];
            foreach ($data as $key) {
                array_push($temperatures, $key['temperature']);
                $time = str_split($key['created_at']);
                array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
            }
            $name = Fishpond::where('id',$request->id)->get()[0]->name;
        } else {
            return redirect('/dashboard');
        }
        return Inertia::render('Graph', [
            'name' => $name,
            'type' => 'temperature',
            'xAxis' => $times,
            'yAxis' => $temperatures,
        ]);
    }
}
