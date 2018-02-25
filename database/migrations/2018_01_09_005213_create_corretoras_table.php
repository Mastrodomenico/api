<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',200);
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
            $table->string('cnpj',18);
            $table->text('descricao');
            $table->string('logotipo');
            $table->integer('temas_id')->unsigned();
            $table->integer('titulares_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('corretoras', function(Blueprint $table) {
            $table->foreign('temas_id')->references('id')->on('temas')->onDelete('cascade');
            $table->foreign('titulares_id')->references('id')->on('titulares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corretoras');
    }
}
