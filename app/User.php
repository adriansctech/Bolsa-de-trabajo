<?php

namespace Bolsa;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     * sdfsdf
     * @var array
     */
    protected $fillable = [
        'email', 'password','tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Tipo(){

        //if (Auth::User()->tipo=='Alumno') {
            return $this->hasOne(Alumno::getClass(),'email','email');
/*
        }elseif (Auth::User()->tipo=='Empresa') {

            return $this->hasOne(Empresa::getClass(),'email','email');

        }else{
            return $this->hasOne(Responsable::getClass(),'email','email');}*/
        
    }

}
