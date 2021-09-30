<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table ='marcas';

    protected $fillable = [
        'clave','nombre_marca','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
    public function proveedores(){
        return $this->belongsToMany('App\Proveedore')
        ->using('App\MarcaProveedore')
        ->withTimestamps();
    }

    public function productos (){//falta
        return $this->hasMany('App\Producto');
    }
}
