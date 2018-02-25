<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('status');
            $table->integer('tipos_seguros_id')->unsigned();
            $table->integer('clientes_agentes_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('indicacoes', function(Blueprint $table) {
            $table->foreign('tipos_seguros_id')->references('id')->on('tipos_seguros')->onDelete('cascade');
            $table->foreign('clientes_agentes_id')->references('id')->on('clientes_agentes')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicacoes');
    }
}
