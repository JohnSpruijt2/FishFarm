<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishpondSensorDataLog extends Model
{
    use HasFactory;
    public function sensorDataLogs() {
        return $this->hasMany(SensorDataLog::class, 'sensor_id', 'sensor_id');
    }
}
