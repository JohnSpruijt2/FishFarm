<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorDataLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $id = 25;
        for ($i=0; $i < 6; $i++) { 
            $temperature = rand(10, 50);
            for ($j=0; $j < 60; $j++) { 
               if ($temperature >= 60) {
                   $temperature = $temperature - 10;
               } else if ($temperature <= 5) {
                   $temperature = $temperature + 10;
               } else {
                   $temperature = $temperature + rand(-5, 5);
               }
               
               $date = date("Y-m-d H:i:s");
               $time = strtotime($date);
               $time = $time + ($j * 60);
               $date = date("Y-m-d H:i:s", $time);
              DB::table('sensor_data_logs')->insert([
               'sensor_id' => $id,
               'type' => 'temperature',
               'value' => $temperature,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
           }
           DB::table('fishpond_sensor_data_log')->insert([
               'sensor_id' => $id,
               'fishpond_id' => null,
           ]);
           $id++;
           $oxygen = rand(3, 8);
            for ($j=0; $j < 60; $j++) { 
               if ($oxygen >= 15) {
                   $oxygen = $oxygen - 5;
               } else if ($oxygen <= 2) {
                   $oxygen = $oxygen + 4;
               } else {
                   $oxygen = $oxygen + rand(-2, 2);
               }
               $date = date("Y-m-d H:i:s");
               $time = strtotime($date);
               $time = $time + ($j * 60);
               $date = date("Y-m-d H:i:s", $time);
               DB::table('sensor_data_logs')->insert([
                'sensor_id' => $id,
                'type' => 'oxygen',
                'value' => $oxygen,
                'created_at' => $date,
                'updated_at' => $date,
               ]);
           }
           DB::table('fishpond_sensor_data_log')->insert([
            'sensor_id' => $id,
            'fishpond_id' => null,
            ]);
           $id++;
           $turbidity = rand(1, 65)/10;
           for ($j=0; $j < 60; $j++) { 
              if ($turbidity >= 15) {
                  $turbidity = $turbidity - 0.8;
              } else if ($turbidity <= 0.2) {
                  $turbidity = $turbidity + 0.4;
              } else {
                  $turbidity = $turbidity + (rand(-2, 2)/10);
              }
              $date = date("Y-m-d H:i:s");
              $time = strtotime($date);
              $time = $time + ($j * 60);
              $date = date("Y-m-d H:i:s", $time);
              DB::table('sensor_data_logs')->insert([
               'sensor_id' => $id,
               'type' => 'turbidity',
               'value' => $turbidity,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
          }
          DB::table('fishpond_sensor_data_log')->insert([
           'sensor_id' => $id,
           'fishpond_id' => null,
           ]);
          $id++;

          $waterLevel = rand(50, 90);
           for ($j=0; $j < 60; $j++) { 
              if ($waterLevel >= 90) {
                  $waterLevel = $waterLevel - 5;
              } else if ($waterLevel <= 50) {
                  $waterLevel = $waterLevel + 10;
              } else {
                  $waterLevel = $waterLevel + (rand(-5, 5));
              }
              $date = date("Y-m-d H:i:s");
              $time = strtotime($date);
              $time = $time + ($j * 60);
              $date = date("Y-m-d H:i:s", $time);
              DB::table('sensor_data_logs')->insert([
               'sensor_id' => $id,
               'type' => 'waterLevel',
               'value' => $waterLevel,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
          }
          DB::table('fishpond_sensor_data_log')->insert([
           'sensor_id' => $id,
           'fishpond_id' => null,
           ]);
          $id++;
        }
    }
}
