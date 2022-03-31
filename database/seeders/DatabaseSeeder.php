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
        $this->call([
            FishpondSeeder::class,
            UserSeeder::class,
        ]);
         /*for ($j=0; $j < 60; $j++) { 
           DB::table('tempsensor')->insert([
            'temperature' => rand(10, 50),
           ]);
         
        }*/
        
    }
}
