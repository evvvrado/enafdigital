<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidiakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('midiakits', function (Blueprint $table) {
            $table->id();
            $table->string("arquivo")->nullable();
            $table->string("nome", 100);
            $table->tinyInteger("tipo")->default(0);
            $table->boolean("mostrar")->default(false);
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
        Schema::dropIfExists('midiakits');
    }
}
