<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FishpondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 7; $i++) { 
            DB::table('fishponds')->insert([
               'name'=> 'Fishpond Number '.$i ,
               'created_at' => now(),
               'updated_at' => now(),
            ]);
            DB::table('dangerzones')->insert([
               'fishpond_id' => $i,
               'data_type' => 'temperature',
               'min' => 5,
               'max' => 40,
               'created_at' => now(),
               'updated_at' => now(),
            ]);
            DB::table('dangerzones')->insert([
               'fishpond_id' => $i,
               'data_type' => 'oxygen',
               'min' => 2,
               'max' => 10,
               'created_at' => now(),
               'updated_at' => now(),
           ]);
           DB::table('dangerzones')->insert([
               'fishpond_id' => $i,
               'data_type' => 'turbidity',
               'min' => -0.5,
               'max' => 5,
               'created_at' => now(),
               'updated_at' => now(),
           ]);
           DB::table('dangerzones')->insert([
               'fishpond_id' => $i,
               'data_type' => 'level',
               'min' => 55,
               'max' => 90,
               'created_at' => now(),
               'updated_at' => now(),
           ]);


            date_default_timezone_set('Europe/Amsterdam');
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
              DB::table('temperatures')->insert([
               'fishpond_id' => $i,
               'temperature' => $temperature,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
           }

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
              DB::table('oxygen_levels')->insert([
               'fishpond_id' => $i,
               'oxygen_level' => $oxygen,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
           }


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
              DB::table('turbidity_levels')->insert([
               'fishpond_id' => $i,
               'ntu' => $turbidity,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
           }

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
              DB::table('water_levels')->insert([
               'fishpond_id' => $i,
               'cm' => $waterLevel,
               'created_at' => $date,
               'updated_at' => $date,
              ]);
           }
         }
    }
}
