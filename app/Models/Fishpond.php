<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishpond extends Model
{
    use HasFactory;

    //dangerzone relations
    public function dangerzone() {
        return $this->hasMany(Dangerzone::class);
    }


    //temperature relations
    public function temperatures() {
        return $this->hasMany(Temperature::class);
    }

    public function latestTemperature() {
        return $this->hasOne(Temperature::class)->latest();
    }

    //oxygen level relations
    public function oxygenLevels() {
        return $this->hasMany(OxygenLevel::class);
    }

    public function latestOxygenLevel() {
        return $this->hasOne(OxygenLevel::class)->latest();
    }

    //turbidity level relations
    public function turbidityLevels() {
        return $this->hasMany(TurbidityLevel::class);
    }

    public function latestTurbidityLevel() {
        return $this->hasOne(TurbidityLevel::class)->latest();
    }

    //water level relations
    public function waterLevels() {
        return $this->hasMany(WaterLevel::class);
    }
    
    public function latestWaterLevel() {
        return $this->hasOne(WaterLevel::class)->latest();
    }
}
