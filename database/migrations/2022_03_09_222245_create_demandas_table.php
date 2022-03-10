<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("solicitante_id");
            $table->unsignedBigInteger("solicitado_id");
            $table->string("descricao");
            $table->string("arquivo")->nullable();
            $table->date("estimativa");
            $table->date("entrega")->nullable();
            $table->boolean("finalizada")->default(false);
            $table->timestamps();
            $table->foreign('solicitante_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('solicitado_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandas');
    }
}
