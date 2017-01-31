<?php

namespace Bolsa\Http\Controllers;

use Illuminate\Http\Request;
use User;

class User extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function deleteUser($email){

        $user=User::findOrFail($email);
        $user->delete();

    }
    
}
