<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteComplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_compl', function (Blueprint $table) {
            $table->string('AC_NUM', 255)->primary();
            $table->string('AC_DATE', 255)->nullable();
            $table->string('AC_LIEU', 255)->nullable();
            $table->string('AC_THEME', 255)->nullable();
            $table->string('AC_MOTIF', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activite_compl');
    }
}
