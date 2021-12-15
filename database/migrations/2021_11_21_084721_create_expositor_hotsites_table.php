<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositorHotsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositor_hotsites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("expositor_id")->nullable();
            $table->string("slogan")->nullable();
            $table->string("site")->nullable();
            $table->string("telefone", 20)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("slug", 50)->nullable();
            $table->string("endereco")->nullable();
            $table->string("cor_destaque", 7)->nullable();
            $table->string("cor_fundo", 7)->nullable();
            $table->string("sessao1_titulo")->nullable();
            $table->text("sessao1_texto")->nullable();
            $table->string("coluna1_titulo")->nullable();
            $table->text("coluna1_texto")->nullable();
            $table->string("coluna2_titulo")->nullable();
            $table->text("coluna2_texto")->nullable();
            $table->string("foto1")->nullable();
            $table->string("foto2")->nullable();
            $table->string("galeria1_titulo")->nullable();
            $table->string("galeria1_descricao")->nullable();
            $table->string("galeria2_titulo")->nullable();
            $table->string("galeria2_descricao")->nullable();
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
        Schema::dropIfExists('expositor_hotsites');
    }
}
