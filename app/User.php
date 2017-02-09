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

        if (Auth::User()->tipo=='alumno') {
        
              return  $this->hasOne('\Bolsa\Alumno','email','email');

        }

        elseif (Auth::User()->tipo=='empresa') {

            return $this->hasOne('\Bolsa\Empresa','email','email');

        }

        else{
            return $this->hasOne('\Bolsa\Responsable','email','email');
        }
        
    }

}
