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
                '../resources/img/bosses/abyss-watcher.jpg',
                '../resources/img/bosses/aldrich-devourer-of-gods.jpg',
                '../resources/img/bosses/ancient-wyvern.jpg',
                '../resources/img/bosses/champion-gundyr.jpg',
                '../resources/img/bosses/crystal-sage.jpg',
                '../resources/img/bosses/curse-rotted-greatwood.jpg',
                '../resources/img/bosses/dancer-of-the-boreal-valley.jpg',
                '../resources/img/bosses/deacon-of-the-deep.jpg',
                '../resources/img/bosses/dragonslayer-armor.jpg',
                '../resources/img/bosses/high-lord-wolnir.jpg',
                '../resources/img/bosses/iudex-gundyr.jpg',
                '../resources/img/bosses/lothric-younger-prince.jpg',
                '../resources/img/bosses/ocelot.jpg',
                '../resources/img/bosses/old_demon_king.jpg',
                '../resources/img/bosses/pontiff_sulyvahn.jpg',
                '../resources/img/bosses/soul-of-cinder.jpg',
                '../resources/img/bosses/the-nameless-king.jpg',
                '../resources/img/bosses/vordt.jpg',
                '../resources/img/bosses/yhorm-the-giant.jpg'
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
