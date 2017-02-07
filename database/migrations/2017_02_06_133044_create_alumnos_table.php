<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('email',125)->unique()->references('email')->on('users');
            $table->string('nombre',45);
            $table->string('apellidos',150);
            $table->string('domicilio',100);
            $table->integer('tlf');
            $table->boolean('trabajofuera');
            $table->string('cvlinkedin',100);
            $table->string('foto',255);
            $table->boolean('valido');
            $table->boolean('informacionOfertas');
            $table->integer('poblacion')->references('id')->on('poblaciones');
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
        Schema::dropIfExists('users');
    }
}
