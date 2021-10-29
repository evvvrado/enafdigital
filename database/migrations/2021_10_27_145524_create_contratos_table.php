<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("expositor_id");
            $table->string("nome")->nullable();
            $table->date("inicio")->nullable();
            $table->date("fim")->nullable();
            $table->double("valor")->default(0);
            $table->boolean("ativo")->default(false);
            $table->string("imagem_mobile")->nullable();
            $table->string("imagem_desktop")->nullable();
            $table->timestamps();
            $table->foreign('expositor_id')->references('id')->on('expositors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
