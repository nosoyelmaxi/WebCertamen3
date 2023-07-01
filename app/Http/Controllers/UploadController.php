<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagenesRequest;
use App\Models\Imagen;
use App\Models\Cuenta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function subirImg(){
        return view('Home.subirImg');
    }

    public function storeImg(ImagenesRequest $request){
        $imagen = new Imagen();
        $imagen->titulo = $request->titulo;
        $imagen->baneada = false;
        $imagen->motivo_ban = null;
        $imagen->cuenta_user = Auth::user()->user;


        if($request->hasFile("archivo")){
            $archivo = $request->file("archivo");
            $archivoimg = Str::slug($request->titulo).".".$archivo->guessExtension();
            $ruta = public_path("imgs/");
            $archivo->move($ruta,$archivoimg);
            $imagen->archivo = $archivoimg;
        }

        $imagen->save();
        return redirect()->route('Home.home');
    }
}
