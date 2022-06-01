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
    // determines which type of graph should be displayed, then requests data from show functions and renderes the page at url/details/{id}/{type}.
    function index(Request $request) {
        if (is_numeric($request->id) == false) {
            return redirect('/dashboard');
        }
        $data = [];
        if ($request->type == 'temperature') {
            
            array_push($data, $this->showTemperatureGraph($request));
        } else if ($request->type == 'oxygen') {
            
            array_push($data, $this->showOxygenGraph($request));
        } else if ($request->type == 'turbidity') {
            
            array_push($data, $this->showTurbidityGraph($request));
        } else if ($request->type == 'level') {
            
            array_push($data, $this->showWaterLevelGraph($request));
        } else {
            return redirect('/details/'.$request->id.'/temperature');
        }

        $fishpond = Fishpond::where('id',$request->id)->first();
        return Inertia::render('Graph', [
            'fishpond' => $fishpond,
            'graphs' => $data,
        ]);
    }

    // Returns the temperature graph data.
    function showTemperatureGraph($request) {
            $fishpond = fishpond::fishpondAllDataWithDangerzones($request->id);
            $times = [];
            $temperatures = [];
            foreach ($fishpond->sensors as $sensor) {
                if ($sensor != null) {
                    foreach ($sensor->values as $value) {
                        if ($value->type == 'temperature') {
                            array_push($temperatures, $value->value);
                            $time = str_split($value->created_at);
                            array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
                        }
                    }
                }
            }
            foreach ($fishpond->dangerzones as $dangerzone ) {
                if ($dangerzone->data_type == 'temperature') {
                    $minimum = $dangerzone->min;
                    $maximum = $dangerzone->max;
                }
            }
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
        $fishpond = fishpond::fishpondAllDataWithDangerzones($request->id);
        $times = [];
        $oxygen = [];
        foreach ($fishpond->sensors as $sensor) {
            if ($sensor != null) {
                foreach ($sensor->values as $value) {
                    if ($value->type == 'oxygen') {
                        array_push($oxygen, $value->value);
                        $time = str_split($value->created_at);
                        array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
                    }
                }
            }
        }
            
        foreach ($fishpond->dangerzones as $dangerzone ) {
            if ($dangerzone->data_type == 'oxygen') {
                $minimum = $dangerzone->min;
                $maximum = $dangerzone->max;
            }
        }
        return [
            'type' => 'oxygen in mg/L',
            'xAxis' => $times,
            'yAxis' => $oxygen,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 2,
            'yMin' => 0,
            'yMax' => 20
        ];
    }

    // Returns the turbidity graph data.
    function showTurbidityGraph($request) {
        $fishpond = fishpond::fishpondAllDataWithDangerzones($request->id);
        $times = [];
        $turbidity = [];
        foreach ($fishpond->sensors as $sensor) {
            if ($sensor != null) {
                foreach ($sensor->values as $value) {
                    if ($value->type == 'turbidity') {
                        array_push($turbidity, $value->value);
                        $time = str_split($value->created_at);
                        array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
                    }
                }
            }
        }
        foreach ($fishpond->dangerzones as $dangerzone ) {
            if ($dangerzone->data_type == 'turbidity') {
                $minimum = $dangerzone->min;
                $maximum = $dangerzone->max;
            }
        }
        return [
            'type' => 'turbidity in NTU',
            'xAxis' => $times,
            'yAxis' => $turbidity,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 0.5,
            'yMin' => 0,
            'yMax' => 10
        ];
    }

    // Returns the water level graph data.
    function showWaterLevelGraph($request) {
        $fishpond = fishpond::fishpondAllDataWithDangerzones($request->id);
        $times = [];
        $waterLevel = [];
        foreach ($fishpond->sensors as $sensor) {
            if ($sensor != null) {
                foreach ($sensor->values as $value) {
                    if ($value->type == 'waterLevel') {
                        array_push($waterLevel, $value->value);
                        $time = str_split($value->created_at);
                        array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
                    }
                }
            }
        }
        foreach ($fishpond->dangerzones as $dangerzone ) {
            if ($dangerzone->data_type == 'level') {
                $minimum = $dangerzone->min;
                $maximum = $dangerzone->max;
            }
        }
        return [
            'type' => 'water level in CM',
            'xAxis' => $times,
            'yAxis' => $waterLevel,
            'min' => $minimum,
            'max' => $maximum,
            'offset' => 10,
            'yMin' => 40,
            'yMax' => 100
        ];
    }
}
