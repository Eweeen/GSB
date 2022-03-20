<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosage', function (Blueprint $table) {
            $table->string('DOS_CODE', 255)->primary();
            $table->string('DOS_QUANTITE', 255)->nullable();
            $table->string('DOS_UNITE', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosage');
    }
}
