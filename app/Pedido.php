<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table ='pedidos';

    protected $fillable = [
        'folio','empleado_id','cliente_id','detalles','valor_pedido','fecha_objetivo','fecha_envio','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function empleado(){
        return $this->belongsTo('App\Empleado');
    }

    public function productos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\PedidoProducto')
        ->withPivot('cantidad','subtotal');
    }

    public function toventa(){//Eliminar tal vez junto con modelo entrega
        return $this->belongsToMany('App\Venta')
        ->using('App\Entrega')
        ->withTimestamps();
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
