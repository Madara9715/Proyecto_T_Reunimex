<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class PresentacioneProducto extends Pivot
{
    protected $table ='presentacione_producto';
    protected $fillable = [
        'id','producto_id','presentacione_id','cantidad','unidad','precio_adquisicion','descuento_id','precio_publico','precio_distribuidor', 'activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function descuento(){
        return $this->belongsTo('App\Descuento');
    }

    public function producto(){
        return $this->belongsTo('App\Producto');
    }

    public function presentacione(){
        return $this->belongsTo('App\Presentacione');
    }
}
