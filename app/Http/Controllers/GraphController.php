<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\TempSensor;
use App\Models\Fishpond;
use App\Models\Oxygen;
use App\Models\Dangerzone;

class GraphController extends Controller
{
    //
    function index(Request $request) {
        $data = [];
        if ($request->type = 'temperature') {
            array_push($data, $this->showTemperatureGraph($request));
        } else if ($request->type = 'oxygen') {
            array_push($data, $this->showOxygenGraph($request));
        } else {
            return redirect('/details/'.$request->id.'/temperature');
        }

        $name = Fishpond::where('id',$request->id)->get()[0]->name;
        return Inertia::render('Graph', [
            'name' => $name,
            'graphs' => $data,
        ]);
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
                array_push($temperatures, $data[$i-1]->temperature);
            }
            $name = 'Fishpond Sensor';
            $minimum = 5;
            $maximum = 40;

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
            
            $minimum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'temperature')->first()->min;
            $maximum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'temperature')->first()->max;
        } else {
            return redirect('/dashboard');
        }
        return [
            'type' => 'temperature',
            'xAxis' => $times,
            'yAxis' => $temperatures,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 5,
            'yMin' => 0,
            'yMax' => 80
        ];
    }

    function showOxygenGraph($request) {
        if (is_numeric($request->id)) {
            $data = Oxygen::orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
            if ($data->first() == null) {
                return redirect('/dashboard');
            }
            $times = [];
            $oxygenLevels = [];
            foreach ($data as $key) {
                array_push($oxygenLevels, $key['temperature']);
                $time = str_split($key['created_at']);
                array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
            }
            
            $minimum = Fishpond::where('id',$request->id)->get()[0]->min;
            $maximum = Fishpond::where('id',$request->id)->get()[0]->max;
        } else {
            return redirect('/dashboard');
        }
    }
}
