<?php

use Illuminate\Database\Seeder;
use Bolsa\Idioma;
use Bolsa\Departamento;
use Bolsa\Ciclo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $idiomas = array(
                array('idioma'=>'inglés'),
                array('idioma'=>'aleman'),
                array('idioma'=>'frances'),
                array('idioma'=>'valenciano'),
                array('idioma'=>'euskera')


                );

    private $departamentos = array(
                array('descripcion'=>'informatica'),
                array('descripcion'=>'administración'),
                array('descripcion'=>'sanitaria'),
                array('descripcion'=>'comunidad'),
                array('descripcion'=>'imagen personal'),
                array('descripcion'=>'hoteleria y turismo'),
                array('descripcion'=>'formación y orientación laboral'),
                array('descripcion'=>'orientación'),
                array('descripcion'=>'formación del profesorado')


                );

    private $ciclos = array(
        array('ciclos'=>'dam','departamento'=>'1','responsable'=>'inf@batoi.es'),
        array('ciclos'=>'daw','departamento'=>'1','responsable'=>'inf@batoi.es'),
        array('ciclos'=>'asix','departamento'=>'1','responsable'=>'inf@batoi.es'),
        array('ciclos'=>'smx','departamento'=>'1','responsable'=>'inf@batoi.es'),
        array('ciclos'=>'auxiliar enfermeria','departamento'=>'3','responsable'=>'san@batoi.es'));


    public function run()
    {
        
DB::table('idiomas')->delete();

foreach( $this->idiomas as $idioma ) 
{
$i = new Idioma;
$i->fill($idioma);
$i->save();
}

DB::table('departamentos')->delete();

foreach( $this->departamentos as $departamento )
{
$i = new Departamento;
$i->fill($departamento);
$i->save();
}
DB::table('ciclos')->delete();

foreach( $this->ciclos as $ciclo ) 
{
$i = new Ciclo;
$i->fill($ciclo);
$i->save();
}
        
}
}
