<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MovimientoProducto extends Pivot
{
    protected $table ='movimiento_producto';
    protected $fillable = [
        'movimiento_id','producto_id','presentacione_id','presentacioneproducto_id','operacione_id','cantidad', 'valor', 
    ];

    public function operacion(){//checar
        return $this->belongsTo('App\Operacione');
    }

    public function movimiento(){//checar
        return $this->belongsTo('App\Movimiento');
    }

    public function producto(){//checar
        return $this->belongsTo('App\Producto');
    }
}
