<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Fishpond;
use App\Models\Temprature;

class DashboardController extends Controller
{
    //
    function index() {
        $data = fishpond::all();
        $temps = [];
        foreach ($data as $item) {
            $temp = Temprature::orderBy('created_at', 'DESC')->where('fishpond_id',$item->id)->take(1)->get()[0];
            array_push($temps, $temp);
        }
        return Inertia::render('Dashboard', [
            'data' => [$data, $temps],
        ]);
    }
}
