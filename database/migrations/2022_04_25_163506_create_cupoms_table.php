<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupoms', function (Blueprint $table) {
            $table->id();
            $table->string("codigo", 50);
            $table->string("descricao", 50);
            // 0 => Porcentagem
            // 1 => Valor
            $table->tinyInteger("tipo")->default(0);
            $table->double("valor")->default(0);
            $table->boolean("validade")->default(true);
            $table->date("inicio")->nullable();
            $table->date("fim")->nullable();
            $table->integer("quantidade")->default(0);
            $table->integer("estoque")->default(0);
            // 0 => Nenhum
            // 1 => Todos
            // 2 => Específicos
            $table->tinyInteger("cursos_presenciais")->default(0);
            $table->tinyInteger("cursos_online")->default(0);
            $table->tinyInteger("eventos")->default(0);
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
        Schema::dropIfExists('cupoms');
    }
}
