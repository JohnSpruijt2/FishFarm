<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishpond extends Model
{
    use HasFactory;

    public function temperatures() {
        return $this->hasMany(Temperature::class);
    }

    public function latestTemperature() {
        return $this->hasOne(Temperature::class)->latest();
    }
}
