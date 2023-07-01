<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Cuenta;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function photos(){
        $imagenes = Imagen::all();
        return view('Artist.photos', compact('imagenes'));
    }

    public function bans(){
        $imagenes = Imagen::all();
        return view('Artist.baneadas', compact('imagenes'));
    }

    public function delete(Imagen $imagen)
    {        
        $imagen -> delete();

        return redirect()->back();
    }
    

}
