<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteragirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interagir', function (Blueprint $table) {
            $table->string('MED_PERTURBATEUR', 255);
            $table->string('MED_MED_PERTURBE', 255);

            $table->primary(['MED_PERTURBATEUR', 'MED_MED_PERTURBE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interagir');
    }
}
