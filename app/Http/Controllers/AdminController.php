<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagenesRequest;
use App\Models\Perfil;
use App\Models\Imagen;
use App\Models\Cuenta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function gestion(){
        $cuentas = Cuenta::all();
        return view('Admin.gestionCuentas',compact('cuentas'));
    }

    public function banear(Imagen $imagen){
        return view('Admin.banear',compact('imagen'));
    }

    public function ban(Request $request,Imagen $imagen){
        $imagen->motivo_ban = $request->motivo_ban;
        $imagen->baneada = 1;
        $imagen->save();
        return redirect()->route('Home.home');
    }
    
}
