<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        /*DB::table('teams')->insert([
            'user_id' => 1,
            'name' => 'test team',
            'personal_team' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\User::factory(10)->create();*/
        for ($i=1; $i < 6; $i++) { 
         DB::table('fishponds')->insert([
            'name'=> 'Fishpond Number '.$i ,
            'created_at' => now(),
            'updated_at' => now(),
            'min_temp' => 5,
            'max_temp' => 40
         ]);
         date_default_timezone_set('Europe/Amsterdam');
         for ($j=0; $j < 60; $j++) { 
            $date = date("Y-m-d H:i:s");
            $time = strtotime($date);
            $time = $time + ($j * 60);
            $date = date("Y-m-d H:i:s", $time);
           DB::table('temperatures')->insert([
            'fishpond_id' => $i,
            'temperature' => rand(10, 50),
            'created_at' => $date,
            'updated_at' => $date,
           ]);
        }
      }
         /*
         for ($j=0; $j < 60; $j++) { 
           DB::table('tempSensor')->insert([
            'temperature' => rand(10, 50),
           ]);
         
        }*/
        
    }
}
