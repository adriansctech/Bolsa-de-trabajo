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
            $table->string('email',125)->primary()->references('email')->on('users');
            $table->string('nombre',45)->nullable();
            $table->string('apellidos',150)->nullable();
            $table->string('domicilio',100)->nullable();
            $table->integer('tlf')->nullable();
            $table->boolean('trabajofuera')->nullable();
            $table->string('cvlinkedin',100)->nullable();
            $table->string('foto',255)->nullable();
            $table->boolean('valido')->default(false);
            $table->boolean('informacionOfertas')->nullable();
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
