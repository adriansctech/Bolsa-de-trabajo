<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiclosAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclosalumnos', function (Blueprint $table) {
            $table->string('ciclo', 150)->references('ciclos')->on('ciclos');
            $table->string('alumno',125)->references('email')->on('alumnos');
            $table->date('finicio');
            $table->date('ffin');
            $table->integer('nota');
            $table->string('empresa', 150);
            $table->primary(['ciclo','alumno']);
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
        Schema::dropIfExists('ciclosAlumnos');
    }
}
