<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => 'admin',
            'personal_team' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'admin' => true,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'current_team_id' => 1,
        ]);
        DB::table('teams')->insert([
            'user_id' => 2,
            'name' => 'test team',
            'personal_team' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\User::factory(10)->create();
        
        for ($i=1; $i < 6; $i++) { 
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
         ]);
         DB::table('dangerzones')->insert([
            'fishpond_id' => $i,
            'data_type' => 'oxygen',
            'min' => 2,
            'max' => 10,
        ]);
        DB::table('dangerzones')->insert([
            'fishpond_id' => $i,
            'data_type' => 'level',
            'min' => 5,
            'max' => 40,
        ]);
        DB::table('dangerzones')->insert([
            'fishpond_id' => $i,
            'data_type' => 'clarity',
            'min' => 5,
            'max' => 40,
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
           DB::table('oxygen')->insert([
            'fishpond_id' => $i,
            'oxygen_level' => $oxygen,
            'created_at' => $date,
            'updated_at' => $date,
           ]);
        }
      }
         for ($j=0; $j < 60; $j++) { 
           DB::table('tempsensor')->insert([
            'temperature' => rand(10, 50),
           ]);
         
        }
        
    }
}
