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
                '../public/img/bosses/abyss-watcher.jpg',
                '../public/img/bosses/aldrich-devourer-of-gods.jpg',
                '../public/img/bosses/ancient-wyvern.jpg',
                '../public/img/bosses/champion-gundyr.jpg',
                '../public/img/bosses/crystal-sage.jpg',
                '../public/img/bosses/curse-rotted-greatwood.jpg',
                '../public/img/bosses/dancer-of-the-boreal-valley.jpg',
                '../public/img/bosses/deacon-of-the-deep.jpg',
                '../public/img/bosses/dragonslayer-armor.jpg',
                '../public/img/bosses/high-lord-wolnir.jpg',
                '../public/img/bosses/iudex-gundyr.jpg',
                '../public/img/bosses/lothric-younger-prince.jpg',
                '../public/img/bosses/ocelot.jpg',
                '../public/img/bosses/old_demon_king.jpg',
                '../public/img/bosses/pontiff_sulyvahn.jpg',
                '../public/img/bosses/soul-of-cinder.jpg',
                '../public/img/bosses/the-nameless-king.jpg',
                '../public/img/bosses/vordt.jpg',
                '../public/img/bosses/yhorm-the-giant.jpg'
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
