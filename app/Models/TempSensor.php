<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TempSensor extends Model
{
    use HasFactory;
    public static function getLatest() {
        return DB::table('tempsensor')->orderBy('id', 'desc')->take(1)->get();
    }
    public static function getLast60() {
        return DB::table('tempsensor')->orderBy('id', 'desc')->take(60)->get();
    }
}
