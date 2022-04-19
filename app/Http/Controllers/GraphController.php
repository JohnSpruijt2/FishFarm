<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Fishpond;
use App\Models\Dangerzone;
use App\Models\SensorDataLog;

class GraphController extends Controller
{
    // determines which type of graph should be displayed, then requests data from show functions and renderes the page.
    function index(Request $request) {
        if (is_numeric($request->id) == false) {
            return redirect('/dashboard');
        }
        $data = [];
        if ($request->type == 'temperature') {
            if (SensorDataLog::where('type', 'temperature')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->first() == null) {
                return redirect('/details/'.$request->id.'/oxygen');
            }
            array_push($data, $this->showTemperatureGraph($request));
        } else if ($request->type == 'oxygen') {
            if (SensorDataLog::where('type', 'oxygen')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->first() == null) {
                return redirect('/details/'.$request->id.'/turbidity');
            }
            array_push($data, $this->showOxygenGraph($request));
        } else if ($request->type == 'turbidity') {
            if (SensorDataLog::where('type', 'turbidity')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->first() == null) {
                return redirect('/details/'.$request->id.'/waterLevel');
            }
            array_push($data, $this->showTurbidityGraph($request));
        } else if ($request->type == 'level') {
            if (SensorDataLog::where('type', 'waterLevel')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->first() == null) {
                return redirect('/dashboard');
            }
            array_push($data, $this->showWaterLevelGraph($request));
        } else {
            return redirect('/details/'.$request->id.'/temperature');
        }

        $fishpond = Fishpond::where('id',$request->id)->get()[0];
        return Inertia::render('Graph', [
            'fishpond' => $fishpond,
            'graphs' => $data,
        ]);
    }

    // Returns the temperature graph data.
    function showTemperatureGraph($request) {
            $data = SensorDataLog::where('type', 'temperature')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
            $times = [];
            $temperatures = [];
            foreach ($data as $key) {
                array_push($temperatures, $key['value']);
                $time = str_split($key['created_at']);
                array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
            }
            
            $minimum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'temperature')->first()->min;
            $maximum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'temperature')->first()->max;
        return [
            'type' => 'temperature in celcius',
            'xAxis' => $times,
            'yAxis' => $temperatures,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 5,
            'yMin' => 0,
            'yMax' => 80
        ];
    }

    // Returns the oxygen graph data.
    function showOxygenGraph($request) {
            $data = SensorDataLog::where('type', 'oxygen')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
            $times = [];
            $oxygenLevels = [];
            foreach ($data as $key) {
                array_push($oxygenLevels, $key['value']);
                $time = str_split($key['created_at']);
                array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
            }
            
            $minimum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'oxygen')->first()->min;
            $maximum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'oxygen')->first()->max;
        return [
            'type' => 'oxygen in mg/L',
            'xAxis' => $times,
            'yAxis' => $oxygenLevels,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 2,
            'yMin' => 0,
            'yMax' => 20
        ];
    }

    // Returns the turbidity graph data.
    function showTurbidityGraph($request) {
            $data = SensorDataLog::where('type', 'turbidity')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
            $times = [];
            $TurbidityLevels = [];
            foreach ($data as $key) {
                array_push($TurbidityLevels, $key['value']);
                $time = str_split($key['created_at']);
                array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
            }
            
            $minimum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'turbidity')->first()->min;
            $maximum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'turbidity')->first()->max;
        return [
            'type' => 'turbidity in NTU',
            'xAxis' => $times,
            'yAxis' => $TurbidityLevels,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 0.5,
            'yMin' => 0,
            'yMax' => 10
        ];
    }

    // Returns the water level graph data.
    function showWaterLevelGraph($request) {
            $data = SensorDataLog::where('type', 'waterLevel')->orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
            $times = [];
            $waterLevels = [];
            foreach ($data as $key) {
                array_push($waterLevels, $key['value']);
                $time = str_split($key['created_at']);
                array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
            }
            
            $minimum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'level')->first()->min;
            $maximum = Dangerzone::where('fishpond_id',$request->id)->where('data_type', 'level')->first()->max;
        return [
            'type' => 'water level in CM',
            'xAxis' => $times,
            'yAxis' => $waterLevels,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 10,
            'yMin' => 40,
            'yMax' => 100
        ];
    }
}
