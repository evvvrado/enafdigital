<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorHotsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_hotsites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("professor_id");
            $table->string("nome", 150)->nullable();
            $table->string("telefone", 20)->nullable();
            $table->string("site")->nullable();
            $table->string("email", 100)->nullable();
            $table->string("video")->nullable();
            $table->text("sobre")->nullable();
            $table->string("sessao1_titulo")->nullable();
            $table->text("sessao1_texto")->nullable();
            $table->string("sessao2_titulo")->nullable();
            $table->text("sessao2_texto")->nullable();
            $table->string("sessao3_titulo")->nullable();
            $table->text("sessao3_texto")->nullable();
            $table->string("foto")->nullable();
            $table->timestamps();
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_hotsites');
    }
}
