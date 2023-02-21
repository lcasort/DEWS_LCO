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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('nick');
            $table->string('email')->unique();
            $table->enum('pic', [
                'https://cdn.pixabay.com/photo/2022/12/10/01/50/woman-7646435_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/35/woman-7646415_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/43/woman-7646427_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/47/woman-7646432_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/16/03/crying-7647358_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/40/woman-7646421_960_720.png'
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
        Schema::dropIfExists('players');
    }
};
