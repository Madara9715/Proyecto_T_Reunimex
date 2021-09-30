<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AlmaceneProducto extends Pivot
{
    protected $table ='almacene_producto';
    protected $fillable = [
        'almacene_id','producto_id', 'stock',
    ];
}
