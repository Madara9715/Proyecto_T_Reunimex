<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriaproducto extends Model
{
    protected $table ='categoriaproductos';

    protected $fillable = [
        'clave','nombre_categoriaP','descripcion','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function productos (){
        return $this->hasMany('App\Producto');
    }
    
    public function subcategoriaproductos(){
        return $this->hasMany('App\Subcategoriaproducto');
    }
}
