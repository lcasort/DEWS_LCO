<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->integer('total_hits');
            $table->integer('enemy_hits');
            $table->integer('scenary_hits');
            $table->integer('finishing_level');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('class_id');
            $table->foreign('player_id')->references('id')->on('player')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
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
        Schema::dropIfExists('game');
    }
};
