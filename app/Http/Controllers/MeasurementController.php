<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\FishMeasurement;
use App\Models\Fish;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    // shows measurements added in the last 24 hours created by the current user unless logged in as admin then all measurements
    public function showRecent() {
        $measurements = FishMeasurement::last24HoursWithFishType();
        return Inertia::render('Measurement', [
            'measurements' => $measurements,
            'title' => 'Measurements from the last 24 hours',
        ]);
    }

    // shows all measurements created by the current user unless logged in as admin then all measurements
    public function showAll() {
        $measurements = FishMeasurement::allWithFishType();
        return Inertia::render('Measurement', [
            'measurements' => $measurements,
            'title' => 'All measurements',
        ]);
    }

    // shows picture of measurement
    public function showPicture(Request $request) {
        $measurement = FishMeasurement::oneWithFishType($request->id);
        $image = asset($measurement->path);
        return Inertia::render('MeasurementPicture', [
            'measurement' => $measurement,
            'image' => $image,
        ]);
    }
}
