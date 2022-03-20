<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVisiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visiteurs', function (Blueprint $table) {
            $table->foreign(['SEC_CODE'], 'visiteurs_ibfk_1')->references(['SEC_CODE'])->on('secteur');
            $table->foreign(['LAB_CODE'], 'visiteurs_ibfk_2')->references(['LAB_CODE'])->on('labo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visiteurs', function (Blueprint $table) {
            $table->dropForeign('visiteurs_ibfk_1');
            $table->dropForeign('visiteurs_ibfk_2');
        });
    }
}
