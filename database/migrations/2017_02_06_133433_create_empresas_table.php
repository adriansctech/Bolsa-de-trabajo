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
            $table->string('email',125)->primary()->references('email')->on('users');
            $table->string('cif',9)->nullable();
            $table->string('nombre',70)->nullable();
            $table->string('actividad',75)->nullable();
            $table->string('domicilio',70)->nullable();
            $table->string('web',100)->nullable();
            $table->string('nombreContacto',100)->nullable();
            $table->string('cargoContacto',100)->nullable();
            $table->string('emailContacto',125)->nullable();
            $table->string('logo')->nullable();
            $table->integer('tlf')->nullable();
            $table->integer('tlfContacto')->nullable();
            $table->integer('sector')->nullable();
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
