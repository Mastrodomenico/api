<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_agentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('foto');
            $table->string('data_nascimento');
            $table->string('cpf');
            $table->string('email');
            $table->string('telefone_1')->nullable();
            $table->string('telefone_2')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('profissao')->nullable();
            $table->string('hobbies')->nullable();
            $table->text('sobre')->nullable();
            $table->boolean('receber_informacoes');
            $table->integer('corretoras_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('clientes_agentes', function(Blueprint $table) {
            $table->foreign('corretoras_id')->references('id')->on('corretoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_agentes');
    }
}
