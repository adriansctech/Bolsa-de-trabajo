<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiclosOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclosofertas', function (Blueprint $table) {
            $table->integer('ciclo')->references('id')->on('ciclos');
            $table->integer('ofertas')->references('id')->on('ofertas');
            $table->primary(['ciclo','ofertas']);
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
        Schema::dropIfExists('ciclosOfertas');
    }
}
