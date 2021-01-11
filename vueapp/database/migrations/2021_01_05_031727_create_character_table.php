<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('character');
		Schema::create('character', function (Blueprint $table) {
            $table->id();
			$table->binary('avatar')->nullable();
			$table->integer('raceId')->unsigned();
			$table->integer('ownerUser')->unsigned();
			$table->string('characterName')->unique();
			$table->string('gameClass');
			$table->integer('page')->default('0');
			$table->integer('chapter')->default('0');
			$table->integer('health')->default('0');
			$table->integer('stamina')->default('0');
			$table->integer('accuracy')->default('1');
			$table->integer('attack')->default('0');
			$table->integer('mapPosition')->nullable();
			$table->integer('scoreTotal')->default('0');
			$table->integer('damageDone')->default('0');
			$table->integer('staminaRegen')->default('0');
			$table->integer('healthRegen')->default('0');
			$table->integer('agility')->default('0');
			$table->integer('damageReceived')->default('0');
			$table->integer('chaptersCleared')->default('0');
			$table->integer('money')->default('0');
			$table->integer('earningsTotal')->default('0');
			$table->integer('attackMultiplier')->default('1');
			$table->integer('defenseMultiplier')->default('1');
            $table->timestamps();
			$table->foreign('ownerUser')->references('id')->on('rpggameusers')->onDelete('cascade'); 
			$table->foreign('raceId')->references('id')->on('character_race')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character');
    }
}
