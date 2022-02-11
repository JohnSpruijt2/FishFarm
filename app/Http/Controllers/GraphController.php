<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Temprature;

class GraphController extends Controller
{
    //
    function index(Request $request) {
        $data = Temprature::orderBy('created_at', 'asc')->where('fishpond_id',$request->id)->take(60)->get();
        $times = [];
        $tempratures = [];
        foreach ($data as $key) {
            array_push($tempratures, $key['temprature']);
            $time = str_split($key['created_at']);
            array_push($times, $time[11].$time[12].$time[13].$time[14].$time[15]);
        }
        return Inertia::render('Graph', [
            'data' => $data,
            'times' => $times,
            'tempratures' => $tempratures,
        ]);
    }
}
