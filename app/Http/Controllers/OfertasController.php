<?php

namespace Bolsa\Http\Controllers;


use Illuminate\Http\Request;
use Bolsa\Oferta;
use Auth;
use Bolsa\User;
use Bolsa\Ciclo;
use Bolsa\cicloOferta;
use Bolsa\idiomaOferta;
use Bolsa\Idioma;

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

//Devuelve los datos para una empresa en concreto, filtradondo las ofertas por CIF
    public function getOfertasEmpresa(){
        $usuario = User::findOrFail(Auth::User()->email);

        if ($usuario->Tipo!=null) {
 
           $datosUsuario = array(
               'email' => Auth::User()->email,
               'nombre' => $usuario->Tipo->nombre,
               'web' => $usuario->Tipo->web,
               'logo' => $usuario->Tipo->logo,
               );
           $ofertas=Oferta::where('cif',$usuario->Tipo->cif)->get();

        }else{

            $datosUsuario = array(
                'email' => Auth::User()->email,
                'nombre' => '',
                'web' => '',
                'logo' => '',
                );
            $ofertas=Oferta::where('cif','')->get();
        }
      
        

        return view('principales.empresa', array('ofertas'=>$ofertas,'usuario'=>$datosUsuario));
    }

//Redirige según el tipo de usuario
    public function chooseHomeUser(){

       

        if(Auth::User()->tipo == "alumno"){

            return redirect("/alumno");

        }else{

            return redirect("/empresa");

        }

    }


    //Recoge el id y devuelve la vista con la oferta asociada a este
    public function getOferta($id){

        return view('allOfertas.show', array('oferta'=>Oferta::findOrFail($id)));

    }

    //Crear nueva oferta segun los parametros de $request
    public function newOferta(Request $request){
            $usuario = User::findOrFail(Auth::User()->email);

            $oferta = $request->all();
            $o = new Oferta;
            $o->fill($oferta); 
            $o->valido=0;
            $o->cif=$usuario->Tipo->cif;//
            $o->save();

            //ciclos requeridos para la oferta
            foreach ($oferta['ciclo'] as $ciclo) {
                $ciclo=strtolower($ciclo);
                $cicloReq = new cicloOferta;
                $ciclo = Ciclo::where('ciclos', '=' ,$ciclo)->firstOrFail();
                $cicloReq->ciclo=$ciclo->id;
                $cicloReq->ofertas=$o->id;
                $cicloReq->save();
            }

            //idiomas requeridos en cada oferta
            foreach ($oferta['idiomas'] as $idioma) {
                $idioma=strtolower($idioma);
                $idiomaReq = new idiomaOferta;
                $idioma = Idioma::where('idioma', '=' ,$idioma)->firstOrFail();
                $idiomaReq->idioma=$idioma->id;
                $idiomaReq->oferta=$o->id;
                $idiomaReq->save();
            }
           
            return redirect('/empresa');

    }

    //Borra la oferta especificada
    public function deleteOferta($id){

        $oferta=Oferta::findOrFail($id);
        $oferta->delete();

    }

    public function validarOferta($id){

        $oferta=Oferta::findOrFail($id);
        $oferta->valido=1;
        $oferta.save();
        
    }

}
