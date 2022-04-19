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

    //Sensor data Log relations
    public function SensorDataLogs() {
        return $this->hasMany(SensorDataLog::class);
    }

    //temperature relations
    public function temperatures() {
        return $this->hasMany(SensorDataLog::class)->where('type', 'temperature');
    }

    public function latestTemperature() {
        return $this->hasOne(SensorDataLog::class)->where('type', 'temperature')->latest();
    }

    //oxygen level relations
    public function oxygenLevels() {
        return $this->hasMany(SensorDataLog::class)->where('type', 'oxygen');
    }

    public function latestOxygenLevel() {
        return $this->hasOne(SensorDataLog::class)->where('type', 'oxygen')->latest();
    }

    //turbidity level relations
    public function turbidityLevels() {
        return $this->hasMany(SensorDataLog::class)->where('type', 'turbidity');
    }

    public function latestTurbidityLevel() {
        return $this->hasOne(SensorDataLog::class)->where('type', 'turbidity')->latest();
    }

    //water level relations
    public function waterLevels() {
        return $this->hasMany(SensorDataLog::class)->where('type', 'waterLevel');
    }
    
    public function latestWaterLevel() {
        return $this->hasOne(SensorDataLog::class)->where('type', 'waterLevel')->latest();
    }
}
