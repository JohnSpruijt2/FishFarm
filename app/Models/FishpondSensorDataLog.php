<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FishpondSensorDataLog extends Model
{
    use HasFactory;
    public function sensorDataLogs() {
        return $this->hasMany(SensorDataLog::class, 'sensor_id', 'sensor_id');
    }

    public static function getUnassignedSensors() {
        $unassignedSensors = DB::table('fishpond_sensor_data_log')->where('fishpond_id', null)->get();
        if ($unassignedSensors->first != null) {
            foreach ($unassignedSensors as $sensor) {
                $value = DB::table('sensor_data_logs')->where('sensor_id', $sensor->sensor_id)->orderBy('created_at', 'desc')->take(1)->get();
                $sensor->{"value"} = $value[0];
            }
           
        } else {
            $unassignedSensors = null;
        }
        return $unassignedSensors;
    }

    public static function getSensorOneDataLog($id) {
        $sensors = DB::table('fishpond_sensor_data_log')->where('fishpond_id', $id)->get();
       
    }

    public static function getSpecific($fishpondId, $sensorId) {
        return DB::table('fishpond_sensor_data_log')->where('fishpond_id', $fishpondId)->where('sensor_id', $sensorId)->first();
    }

    public static function updateSpecific($id, $sensorId, $fishpondId) {
        DB::table('fishpond_sensor_data_log')->where('id', $id)->update(['fishpond_id' => null]);
        DB::table('fishpond_sensor_data_log')->where('sensor_id', $sensorId)->update(['fishpond_id' => $fishpondId]);
    } 

    public static function updateNull($id) {
        DB::table('fishpond_sensor_data_log')->where('id', $id)->update(['fishpond_id' => null]);
    }

    public static function updateFresh($sensorId, $fishpondId) {
        DB::table('fishpond_sensor_data_log')->where('sensor_id', $sensorId)->update(['fishpond_id' => $fishpondId]);
    }
}
