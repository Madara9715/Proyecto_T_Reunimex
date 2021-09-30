<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InventarioProducto extends Pivot
{
    protected $table ='inventario_producto';
    protected $fillable = [
        'inventario_id','producto_id','presentacione_id','presentacioneproducto_id' ,'stock','stock_restante','status',
    ];
}
