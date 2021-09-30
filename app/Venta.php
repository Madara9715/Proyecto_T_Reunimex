<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table ='ventas';

    protected $fillable = [
        'folio','cliente_id','empleado_id','tipoventa_id','tipopago_id','descuento_id',
        'subtotal_venta','total_venta','observaciones','activo',
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

    public function tipoventa(){
        return $this->belongsTo('App\Tipoventa');
    }

    public function tipopago(){
        return $this->belongsTo('App\Tipopago');
    }

    public function descuento(){
        return $this->belongsTo('App\Descuento');
    }

    public function productos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\ProductoVenta')
        ->withPivot('presentacione_id' ,'presentacioneproducto_id' ,'cantidad','importe','descuento_id','total_importe');
    }

    public function deuda(){ //no estoy segura si es one o many xd 
        return $this->hasOne('App\Deuda');
    }

    public function pagos(){
        return $this->hasManyThrough('App\Pago','App\Deuda');
    }

    public function frompedido(){//Eliminar tal vez junto con modelo entrega
        return $this->belongsToMany('App\Pedido')
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


    protected static function boot()
    {
        parent::boot();
        self::created(function($newventa){
            if (($newventa->id) > 10000000) {
                $newventa->update([
                    'folio' => 'V-' . $newventa->id,
                ]);
            }else if (($newventa->id) > 1000000) {
                $newventa->update([
                    'folio' => 'V-0' . $newventa->id,
                ]);
            }else if (($newventa->id) > 100000) {
                $newventa->update([
                    'folio' => 'V-00' . $newventa->id,
                ]);
            }  else if (($newventa->id) > 10000) {
                $newventa->update([
                    'folio' => 'V-000' . $newventa->id,
                ]);
            }else if (($newventa->id) > 1000) {
                $newventa->update([
                    'folio' => 'V-0000' . $newventa->id,
                ]);
            }else if (($newventa->id) > 100) {
                $newventa->update([
                    'folio' => 'V-00000' . $newventa->id,
                ]);
            } else if (($newventa->id) > 10) {
                $newventa->update([
                    'folio' => 'V-000000' . $newventa->id,
                ]);
            }  
            else {
                $newventa->update([
                    'folio' => 'V-0000000' . $newventa->id,
                ]);
            }
        });
    }

}
