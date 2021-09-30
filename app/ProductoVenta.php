<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductoVenta extends Pivot
{
    protected $table ='producto_venta';
    public $timestamps = false;

    protected $fillable = [
        'venta_id','producto_id','presentacione_id' ,'presentacioneproducto_id' ,'cantidad','importe','descuento_id','total_importe',
    ];
}
