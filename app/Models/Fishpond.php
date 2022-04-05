<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishpond extends Model
{
    use HasFactory;

    //dangerzone relations
    public function dangerzones() {
        return $this->hasMany(Dangerzone::class);
    }


    //temperature relations
    public function temperatures() {
        return $this->hasMany(TemperatureLog::class);
    }

    public function latestTemperature() {
        return $this->hasOne(TemperatureLog::class)->latest();
    }

    //oxygen level relations
    public function oxygenLevels() {
        return $this->hasMany(OxygenLevelLog::class);
    }

    public function latestOxygenLevel() {
        return $this->hasOne(OxygenLevelLog::class)->latest();
    }

    //turbidity level relations
    public function turbidityLevels() {
        return $this->hasMany(TurbidityLevelLog::class);
    }

    public function latestTurbidityLevel() {
        return $this->hasOne(TurbidityLevelLog::class)->latest();
    }

    //water level relations
    public function waterLevels() {
        return $this->hasMany(WaterLevelLog::class);
    }
    
    public function latestWaterLevel() {
        return $this->hasOne(WaterLevelLog::class)->latest();
    }
}
