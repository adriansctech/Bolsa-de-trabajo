<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnosIdiomas', function (Blueprint $table) {
            $table->string('email',125)->references('email')->on('alumnos');
            $table->integer('idioma')->references('id')->on('idiomas');
            $table->string('nivel',2);
            $table->primary(['email','idioma']);
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
        Schema::dropIfExists('alumnosIdiomas');
    }
}
