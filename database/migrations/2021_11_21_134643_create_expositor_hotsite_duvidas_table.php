<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositorHotsiteDuvidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositor_hotsite_duvidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("expositor_hotsite_id")->nullable();
            $table->string("duvida")->nullable();
            $table->string("resposta", 107)->nullable();
            $table->timestamps();
            $table->foreign('expositor_hotsite_id')->references('id')->on('expositor_hotsites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expositor_hotsite_duvidas');
    }
}
