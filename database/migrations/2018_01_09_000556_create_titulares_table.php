<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',200);
            $table->date('data_nascimento');
            $table->string('cpf',18);
            $table->string('email',250);
            $table->string('telefone_1',17);
            $table->string('telefone_2',17);
            $table->boolean('telefone_1_wp');
            $table->boolean('telefone_2_wp');
            $table->string('cep',9);
            $table->string('rua',100);
            $table->string('numero',6);
            $table->string('bairro',100);
            $table->string('cidade',100);
            $table->string('estado',40);
            $table->string('pais',150);
            $table->string('complemento',100);
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
        Schema::dropIfExists('titulares');
    }
}
