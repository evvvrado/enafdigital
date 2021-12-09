<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConfiguracaos2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('configuracaos', function (Blueprint $table) {
            $table->boolean("usar_configuracoes_gerais_pagamento")->default(false);
            $table->boolean("liberar_boleto")->default(false);
            $table->boolean("liberar_cartao")->default(false);
            $table->tinyInteger("max_parcelas_cartao")->default(12);
            $table->double("min_valor_parcela_cartao", 9, 2)->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
