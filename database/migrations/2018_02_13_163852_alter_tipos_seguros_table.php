<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTiposSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipos_seguros', function(Blueprint $table) {
            $table->integer('corretoras_id')->unsigned();
        });

        Schema::table('tipos_seguros', function(Blueprint $table) {
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
        Schema::table('tipos_seguros', function (Blueprint $table) {
            $table->dropForeign('tipos_seguros_corretoras_id_foreign');
            $table->dropColumn('corretoras_id');
        });
    }
}
