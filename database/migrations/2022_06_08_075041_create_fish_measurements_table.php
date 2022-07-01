<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_measurements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fish_type');
            $table->string('name');
            $table->text('description');
            $table->string('path');
            $table->float('length');
            $table->float('width');
            $table->string('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fish_measurements');
    }
}
