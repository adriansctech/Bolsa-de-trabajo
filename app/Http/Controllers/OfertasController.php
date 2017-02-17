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

  
           $datosUsuario = array(
               'email' => Auth::User()->email,
               'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
               'apellidos' => isset($usuario->Tipo->apellidos)?$usuario->Tipo->apellidos:'',
               'foto' => isset($usuario->Tipo->foto)?$usuario->Tipo->foto:'../img/user.jpg',
               );


      
        $ofertas=Oferta::all();


        return view('principales.alumno', array('ofertas'=>$ofertas,'usuario'=>$datosUsuario));
    }

//Devuelve los datos para una empresa en concreto, filtradondo las ofertas por 

    public function getOfertasEmpresa(){
        $usuario = User::findOrFail(Auth::User()->email);
 
           $datosUsuario = array(
               'email' => Auth::User()->email,
               'nombre' => isset($usuario->Tipo->nombre)?$usuario->Tipo->nombre:'',
               'web' => isset($usuario->Tipo->web)?$usuario->Tipo->web:'',
               'logo' => isset($usuario->Tipo->logo)?$usuario->Tipo->logo:'../img/user.jpg',
               );
           $ofertas=Oferta::where('cif',isset($usuario->Tipo->cif)?$usuario->Tipo->cif:'')->get();


        

        return view('principales.empresa', array('ofertas'=>$ofertas,'usuario'=>$datosUsuario));
    }

//Redirige según el tipo de usuario
    public function chooseHomeUser(){

       

        if(Auth::User()->tipo == "alumno"){

            return redirect("/alumno");

        }else{
            if (Auth::User()->tipo == "empresa") {
                return redirect("/empresa");
       
        }else{
            return redirect("/responsable");

        } }

    }


    //Recoge el id y devuelve la vista con la oferta asociada a este
    public function getOferta($id){

        return view('oferta', array('oferta'=>Oferta::findOrFail($id)));

    }

    //Crear nueva oferta segun los parametros de $request
    protected function crearOferta(){





        return view('empresa.crearOferta', array('ciclos'=>Ciclo::all(),'idiomas'=>Idioma::all()));
    }


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

    public function validaOferta(Request $request){

        $oferta=Oferta::findOrFail($request->id);
        $oferta->valido=1;
        $oferta.save();
        
    }


    public function getOfertasResponsable(){
      $ofertas=Oferta::where('valido',0);

      return view('responsable.ofertas',array('ofertas'=>$ofertas));
    }

    public function getOfertasCiclo(){

      return view('responsable.ofertas');

    }

}
