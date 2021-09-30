<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table ='descuentos';

    protected $fillable = [
        'clave','nombre_descuento','porcentaje_descuento','valor_descuento','descripcion','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function ventas (){
        return $this->hasMany('App\Venta');
    }

    public function productos (){
        return $this->hasMany('App\Producto');
    }
}
