<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;

class PruebaController extends Controller
{
    public function show ($id){
        $municipios = Estado::find($id)->municipios()->paginate(25);
        return view('municipios',compact('municipios'));
    }
    public function edit ($id){
        echo "Editar: ".$id;
    }
    public function delete ($id){
        echo "Eliminar: ".$id;
    }
    
}
