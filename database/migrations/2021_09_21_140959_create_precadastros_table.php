<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precadastros', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("filiacao")->default(0);
            $table->string("empresa")->nullable();
            $table->string("nome");
            $table->string("email");
            $table->string("telefone", 18);
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
        Schema::dropIfExists('precadastros');
    }
}
