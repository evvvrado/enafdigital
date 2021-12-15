<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorHotsiteDepoimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_hotsite_depoimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("professor_hotsite_id")->nullable();
            $table->string("nome", 100)->nullable();
            $table->string("depoimento", 107)->nullable();
            $table->string("foto")->nullable();
            $table->string("url")->nullable();
            $table->boolean("video")->default(false);
            $table->timestamps();
            $table->foreign('professor_hotsite_id')->references('id')->on('professor_hotsites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_hotsite_depoimentos');
    }
}
