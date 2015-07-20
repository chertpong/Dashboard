<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('numPass');
            $table->integer('numLive');
            $table->double('allDegreeAngle');
            $table->double('distanceHead');
            $table->double('degreeSed');
            $table->double('averageVelocity');
            $table->string('hash',1024);
            $table->double('score');
            $table->double('avoid');
            $table->double('speed');
            $table->double('time');
            $table->double('distance');
            $table->double('calories');
            $table->timestamp('create_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game_data');
    }
}
