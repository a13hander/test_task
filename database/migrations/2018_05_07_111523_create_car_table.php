<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('import_id');
            $table->integer('price');
            $table->integer('kilometrage');
            $table->unsignedInteger('model_id');
            $table->year('y');
            $table->string('body_type');
            $table->tinyInteger('doors');
            $table->string('color');
            $table->string('fuel_type');
            $table->float('engine_size', 1, 1);
            $table->smallInteger('power');
            $table->string('transmission');
            $table->string('drive_type');
            $table->json('images');
            $table->foreign('model_id')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
