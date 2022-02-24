<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Fishpond;
use App\Models\Temperature;

class DashboardController extends Controller
{
    //
    function index() {
        $data = fishpond::all()->load('latestTemperature');
        return Inertia::render('Dashboard', [
            'data' => $data,
        ]);
    }
}
