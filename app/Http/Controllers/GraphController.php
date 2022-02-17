<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Temperature;

class GraphController extends Controller
{
    //
    function index(Request $request) {
        $data = Temperature::orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
        $times = [];
        $temperatures = [];
        foreach ($data as $key) {
            array_push($temperatures, $key['temperature']);
            $time = str_split($key['created_at']);
            array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
        }
        return Inertia::render('Graph', [
            'data' => $data,
            'times' => $times,
            'temperatures' => $temperatures,
        ]);
    }
}
