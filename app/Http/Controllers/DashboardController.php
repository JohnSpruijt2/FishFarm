<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fishpond;
use App\Models\Temperature;
use App\Models\TempSensor;

class DashboardController extends Controller
{
    //
    function index() {
        $data = fishpond::all()->load('latestTemperature');
        $isAdmin = Auth::user()->admin;

        return Inertia::render('Dashboard', [
            'data' => $data,
            'isAdmin' => $isAdmin,
        ]);
    }
}
