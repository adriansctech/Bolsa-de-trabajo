<?php

namespace Bolsa\Http\Controllers;


use Illuminate\Http\Request;
use Bolsa\Oferta;
use Auth;
use Bolsa\User;

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
    public function getOfertasAlumno(){
        $usuario = User::findOrFail(Auth::User()->email);

        if ($usuario->Tipo!=null) {


           $datosUsuario = array(
               'email' => Auth::User()->email,
               'nombre' => $usuario->Tipo->nombre,
               'apellidos' => $usuario->Tipo->apellidos,
               'foto' => $usuario->Tipo->foto,
               );

        }else{

            $datosUsuario = array(
                'email' => Auth::User()->email,
                'nombre' => '',
                'apellidos' => '',
                'foto' => '',
                );

        }
      
        $ofertas=Oferta::all();

        return view('principales.alumno', array('ofertas'=>$ofertas,'usuario'=>$datosUsuario));
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
