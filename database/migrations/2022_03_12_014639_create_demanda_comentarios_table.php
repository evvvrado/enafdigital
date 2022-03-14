<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandaComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demanda_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("demanda_id");
            $table->unsignedBigInteger("usuario_id");
            $table->string("conteudo");
            $table->timestamps();
            $table->foreign('demanda_id')->references('id')->on('demandas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demanda_comentarios');
    }
}
