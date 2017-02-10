<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->string('email',125)->unique()->references('email')->on('users');
            $table->string('cif',9);
            $table->string('nombre',70);
            $table->string('actividad',75);
            $table->string('domicilio',70);
            $table->string('web',100);
            $table->string('nombreContacto',100);
            $table->string('cargoContacto',100);
            $table->string('emailContacto',125);
            $table->string('logo');
            $table->integer('tlf');
            $table->integer('tlfContacto');
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
        Schema::dropIfExists('empresas');
    }
}
