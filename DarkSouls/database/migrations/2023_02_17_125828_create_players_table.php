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
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('country');
            $table->string('nick')->unique();
            $table->string('email')->unique();
            $table->enum('pic', [
                'img/bosses/abyss-watcher.jpg',
                'img/bosses/aldrich-devourer-of-gods.jpg',
                'img/bosses/ancient-wyvern.jpg',
                'img/bosses/champion-gundyr.jpg',
                'img/bosses/crystal-sage.jpg',
                'img/bosses/curse-rotted-greatwood.jpg',
                'img/bosses/dancer-of-the-boreal-valley.jpg',
                'img/bosses/deacon-of-the-deep.jpg',
                'img/bosses/dragonslayer-armor.jpg',
                'img/bosses/high-lord-wolnir.jpg',
                'img/bosses/iudex-gundyr.jpg',
                'img/bosses/lothric-younger-prince.jpg',
                'img/bosses/ocelot.jpg',
                'img/bosses/old_demon_king.jpg',
                'img/bosses/pontiff_sulyvahn.jpg',
                'img/bosses/soul-of-cinder.jpg',
                'img/bosses/the-nameless-king.jpg',
                'img/bosses/vordt.jpg',
                'img/bosses/yhorm-the-giant.jpg'
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
