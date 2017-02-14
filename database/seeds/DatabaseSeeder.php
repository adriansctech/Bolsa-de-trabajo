<?php

use Illuminate\Database\Seeder;
use Bolsa\Provincia;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $provincias = array(
                array('nombre'=>'Alava'),
                array('nombre'=>'Albacete'),
                array('nombre'=>'Alicante'),
                array('nombre'=>'Almería'),
                array('nombre'=>'Asturias'),
                array('nombre'=>'Avila'),
                array('nombre'=>'Badajoz'),
                array('nombre'=>'Barcelona'),
                array('nombre'=>'Burgos'),
                array('nombre'=>'Cáceres'),
                array('nombre'=>'Cádiz'),
                array('nombre'=>'Cantabria'),
                array('nombre'=>'Castellón'),
                array('nombre'=>'Ciudad Real'),
                array('nombre'=>'Córdoba'),
                array('nombre'=>'La Coruña'),
                array('nombre'=>'Cuenca'),
                array('nombre'=>'Gerona'),
                array('nombre'=>'Granada'),
                array('nombre'=>'Guadalajara'),
                array('nombre'=>'Guipúzcoa'),
                array('nombre'=>'Huelva'),
                array('nombre'=>'Huesca'),
                array('nombre'=>'Islas Baleares'),
                array('nombre'=>'Jaén'),
                array('nombre'=>'León'),
                array('nombre'=>'Lérida'),
                array('nombre'=>'Lugo'),
                array('nombre'=>'Madrid'),
                array('nombre'=>'Málaga'),
                array('nombre'=>'Murcia'),
                array('nombre'=>'Navarra'),
                array('nombre'=>'Orense'),
                array('nombre'=>'Palencia'),
                array('nombre'=>'Las Palmas'),
                array('nombre'=>'Pontevedra'),
                array('nombre'=>'La Rioja'),
                array('nombre'=>'Salamanca'),
                array('nombre'=>'Segovia'),
                array('nombre'=>'Sevilla'),
                array('nombre'=>'Soria'),
                array('nombre'=>'Tarragona'),
                array('nombre'=>'Santa Cruz de Tenerife'),
                array('nombre'=>'Teruel'),
                array('nombre'=>'Toledo'),
                array('nombre'=>'Valencia'),
                array('nombre'=>'Valladolid'),
                array('nombre'=>'Vizcaya'),
                array('nombre'=>'Zamora'),
                array('nombre'=>'Zaragoza')
                );

    public function run()
    {
        
        DB::table('provincias')->delete();

        foreach( $this->provincias as $provincia ) 
            {
                $p = new Provincia;
                $p->nombre = $provincia['nombre'];
                $p->save();
            }
        
}
}