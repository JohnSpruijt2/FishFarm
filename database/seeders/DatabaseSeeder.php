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
        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => 'test team',
            'personal_team' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\User::factory(10)->create();
        DB::table('fishponds')->insert([
            'name'=> 'Fishpond Numbero Uno' ,
            'created_at' => now(),
            'updated_at' => now()
         ]);
         DB::table('fishponds')->insert([
            'name'=> 'Fishpond Numbero dus' ,
            'created_at' => now(),
            'updated_at' => now()
         ]);
         DB::table('fishponds')->insert([
            'name'=> 'Fishpond Numbero tos' ,
            'created_at' => now(),
            'updated_at' => now()
         ]);
         date_default_timezone_set('Europe/Amsterdam');
         for ($i = 1; $i<4; $i++) {
            for ($j=0; $j < 60; $j++) { 
                $date = date("Y-m-d H:i:s");
                $time = strtotime($date);
                $time = $time - ($j * 60);
                $date = date("Y-m-d H:i:s", $time);
               DB::table('tempratures')->insert([
                'fishpond_id' => $i,
                'temprature' => rand(10, 50),
                'created_at' => $date,
                'updated_at' => $date,
               ]);
            }
         }
         
    }
}
