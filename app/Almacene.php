<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacene extends Model
{
    protected $table ='almacenes';
    protected $fillable = [
        'clave','nombre_almacen','detalles','telefono_fijo','direccion','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function direcciones()
    {
        return $this->morphMany('App\Direccione','direccionable');
    }

    public function productos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\AlmaceneProducto')
        ->withTimestamps()
        ->withPivot('stock');
    }

    public function origenes()
    {
        return $this->morphMany('App\MOrigen','originable');
    }

    public function destinos()
    {
        return $this->morphMany('App\MDestino','destinable');
    }
    
}
