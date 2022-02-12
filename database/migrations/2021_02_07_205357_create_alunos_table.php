<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 50);
            $table->string("email", 50)->unique();
            $table->string("senha");
            $table->string("cpf", 15)->unique();
            $table->string("telefone", 15)->nullable();
            $table->date("ultimo_acesso")->nullable();
            $table->string("token_senha", 20)->nullable();
            $table->string("rua", 100)->nullable();
            $table->string("cidade", 50)->nullable();
            $table->string("estado", 2)->nullable();
            $table->string("avatar", 255)->nullable();
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
        Schema::dropIfExists('alunos');
    }
}
