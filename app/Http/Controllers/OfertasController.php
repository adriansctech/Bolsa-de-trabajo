<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use Oferta;

class OfertasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Recoge todas las ofertas de la base de datos y las pasa como parametro "ofertas" a la vista "allOfertas"
    public function getAllOfertas(){
        $datosUsuario = array(
            'email' => Auth::User()->email,
            'nombre' => Auth::User()->Tipo->nombre,
            'apellidos' => Auth::User()->Tipo->apellidos,
            'foto' => Auth::User()->Tipo->foto,
            );

        return view('allOfertas.show', array('ofertas'=>Oferta::all(),'usuario'=>$datosUsuario));
    }



    //Recoge el id y devuelve la vista con la oferta asociada a este
    public function getOferta($id){

        return view('allOfertas.show', array('oferta'=>Oferta::findOrFail($id)));

    }

    //Crear nueva oferta segun los parametros de $request
    public function newOferta(Request $request){

            $oferta = $request->all();
            $o = new Oferta;
            $o->fill($oferta);//Comprobar que coge los datos de campos correctamente
            $o->save();

    }

    //Borra la oferta especificada
    public function deleteOferta($id){

        $oferta=Oferta::findOrFail($id);
        $oferta->delete();

    }

}
