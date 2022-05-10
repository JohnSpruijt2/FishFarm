<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\FishpondSensorDataLog;

class Fishpond extends Model
{
    use HasFactory;

    //dangerzone relations
    public function dangerzones() {
        return $this->hasMany(Dangerzone::class);
    }

    //Sensor data Log relations
    public function sensorDataLogs() {
        return $this->belongsToMany(SensorDataLog::class, 'fishpond_sensor_data_log', 'fishpond_id', 'sensor');
    }

    public static function allFishpondsLatestData() {
        $fishponds = Fishpond::all();
        foreach ($fishponds as $fishpond) {
            $sensors = DB::table('fishpond_sensor_data_log')->where('fishpond_id', $fishpond->id)->get();
            foreach ($sensors as $sensor) {
                $value = DB::table('sensor_data_logs')->where('sensor_id', $sensor->sensor_id)->orderBy('created_at', 'desc')->take(1)->get();
                $sensor->{"value"} = $value[0];
            }
            $fishpond->{"sensors"} = $sensors;
        }
        
        return $fishponds;
    }

    public static function fishpondLatestData($id) {
        $fishpond = Fishpond::where('id', $id)->first();
        $sensors = DB::table('fishpond_sensor_data_log')->where('fishpond_id', $fishpond->id)->get();
        foreach ($sensors as $sensor) {
            $value = DB::table('sensor_data_logs')->where('sensor_id', $sensor->sensor_id)->orderBy('created_at', 'desc')->take(1)->get();
            $sensor->{"value"} = $value[0];
        }
        $fishpond->{"sensors"} = $sensors;
        
        
        return $fishpond;
    }

    public static function allFishpondsAllData() {
        $fishponds = Fishpond::all();
        foreach ($fishponds as $fishpond) {
            $sensors = DB::table('fishpond_sensor_data_log')->where('fishpond_id', $fishpond->id)->get();
            foreach ($sensors as $sensor) {
                $values = DB::table('sensor_data_logs')->where('sensor_id', $sensor->sensor_id)->get();
                $sensor->{"values"} = $values;
            }
            $fishpond->{"sensors"} = $sensors;
        }
        
        return $fishponds;
    }

    public static function fishpondAllData($id) {
        $fishpond = Fishpond::where('id', $id)->first();
        $sensors = DB::table('fishpond_sensor_data_log')->where('fishpond_id', $fishpond->id)->get();
            foreach ($sensors as $sensor) {
                $values = DB::table('sensor_data_logs')->where('sensor_id', $sensor->sensor_id)->get();
                $sensor->{"values"} = $values;
            }
            $fishpond->{"sensors"} = $sensors;
        
        return $fishpond;
    }
}