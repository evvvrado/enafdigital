<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupomProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupom_produtos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger("cupom_id");
            $table->unsignedBigInteger("curso_id")->nullable();
            $table->unsignedBigInteger("evento_id")->nullable();
            // 0 => Curso
            // 1 => Evento
            $table->tinyInteger("tipo")->default(0);
            $table->foreign('cupom_id')->references('id')->on('cupoms')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
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
        Schema::dropIfExists('cupom_produtos');
    }
}
