<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_fotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("galeria_id")->nullable();
            $table->string("imagem")->nullable();
            $table->timestamps();
            $table->foreign('galeria_id')->references('id')->on('galerias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_fotos');
    }
}
