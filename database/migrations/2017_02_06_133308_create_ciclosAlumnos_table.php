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
        Schema::create('ciclosAlumnos', function (Blueprint $table) {
            $table->integer('ciclo')->unique()->references('id')->on('ciclos');
            $table->string('alumno',125)->unique()->references('email')->on('alumnos');
            $table->date('finicio');
            $table->date('ffin');
            $table->integer('nota');
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
