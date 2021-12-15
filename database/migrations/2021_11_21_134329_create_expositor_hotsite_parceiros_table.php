<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositorHotsiteParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositor_hotsite_parceiros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("expositor_hotsite_id")->nullable();
            $table->string("nome")->nullable();
            $table->string("url")->nullable();
            $table->string("logo")->nullable();
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
        Schema::dropIfExists('expositor_hotsite_parceiros');
    }
}
