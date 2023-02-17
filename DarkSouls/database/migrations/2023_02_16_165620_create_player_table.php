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
        Schema::create('player', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('nick');
            $table->string('email')->unique();
            $table->enum('pic', [
                'https://cdn.pixabay.com/photo/2022/12/10/01/43/woman-7646427_1280.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/40/woman-7646421_1280.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/47/woman-7646432_1280.png'
            ]);
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
        Schema::dropIfExists('player');
    }
};
