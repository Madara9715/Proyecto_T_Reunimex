<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosPresentacion extends Model
{
    protected $table ='productos_presentacion';
    protected $fillable = [
        'producto_id','presentacion_id','cantidadpresentacion','unidadpresentacion',
        'precio_adquisicion','descuento_id','precio_publico','precio_distribuidor','activo',
    ];
    
    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

}
