<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTable extends Migration
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
            $table->foreignIdFor(CreatePlayerTable::class);
            $table->foreignIdFor(CreateClassTable::class);
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
