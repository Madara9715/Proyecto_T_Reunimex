<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PedidoProducto extends Pivot
{
    protected $table ='pedido_producto';
    public $timestamps = false;

    protected $fillable = [
        'pedido_id','producto_id','cantidad','subtotal',
    ];
}
