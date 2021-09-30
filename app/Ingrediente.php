<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table ='ingredientes';

    protected $fillable = [
        'clave','nombre_ingrediente', 'descripcion', 'activo'
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function composiciones(){
        return $this->belongsToMany('App\Composicione')
        ->using('App\ComposicioneIngrediente')
        ->withPivot('cantidad','unidad_medida');
    }
}
