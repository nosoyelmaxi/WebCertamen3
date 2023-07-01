<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Cuenta;
use App\Models\Imagen;

class HomeController extends Controller
{
    public function home(){
        $imagenes = Imagen::all();
        return view('Home.home', compact('imagenes'));
    }

    public function login(){
        return view('RegLog.login');
    }

    public function registro(){
        return view('RegLog.register');
    }

}
