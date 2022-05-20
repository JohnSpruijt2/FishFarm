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
            SensorDataLogSeeder::class,
        ]);
        for ($i=0; $i < 6; $i++) {
            DB::table('mailing_lists')->insert([
                'user_id' => 1,
                'fishpond_id' => $i+1,
            ]);
        }
    }
}
