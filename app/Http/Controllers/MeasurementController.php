<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\FishMeasurement;
use App\Models\Fish;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    //
    public function showRecent() {
        $measurements = FishMeasurement::last24HoursWithFishType();
        return Inertia::render('Measurement', [
            'measurements' => $measurements,
            'title' => 'Measurements from the last 24 hours',
        ]);
    }

    public function showAll() {
        $measurements = FishMeasurement::allWithFishType();
        return Inertia::render('Measurement', [
            'measurements' => $measurements,
            'title' => 'All measurements',
        ]);
    }

    public function showPicture(Request $request) {
        $measurement = FishMeasurement::oneWithFishType($request->id);
        $image = asset($measurement->path);
        return Inertia::render('MeasurementPicture', [
            'measurement' => $measurement,
            'image' => $image,
        ]);
    }
}
