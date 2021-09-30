<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoriaproducto extends Model
{
    protected $table ='subcategoriaproductos';

    protected $fillable = [
        'categoriaproducto_id','clave','nombre_subCP','descripcion','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function categoriaproducto(){
        return $this->belongsTo('App\Categoriaproducto');
    }

    public function productos (){//falta
        return $this->hasMany('App\Producto');
    }
}
