<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FishMeasurement extends Model
{
    use HasFactory;
    public static function last24HoursWithFishType() {
        if (Auth::user()->admin == true) {
            $measurements = FishMeasurement::whereBetween('created_at', [now()->subMinutes(1440), now()])->get();
        } else {
            $measurements = FishMeasurement::whereBetween('created_at', [now()->subMinutes(1440), now()])->where('user_id', Auth::user()->id)->get();
        }
        foreach ($measurements as $measurement) {
            $measurement->{"fish"} = DB::table('fish')->where('id', $measurement->fish_type)->first();
        }
        return $measurements;
    }

    public static function allWithFishType() {
        if (Auth::user()->admin == true) {
            $measurements = FishMeasurement::all();
        } else {
            $measurements = FishMeasurement::where('user_id', Auth::user()->id)->get();
        }
        foreach ($measurements as $measurement) {
            $measurement->{"fish"} = DB::table('fish')->where('id', $measurement->fish_type)->first();
        }
        return $measurements;
    }

    public static function oneWithFishType($id) {
        $measurement = FishMeasurement::where('id', $id)->first();
        $measurement->{"fish"} = DB::table('fish')->where('id', $measurement->fish_type)->first();
        return $measurement;
    }
}
