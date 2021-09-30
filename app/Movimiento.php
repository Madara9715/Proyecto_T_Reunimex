<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table ='movimientos';

    protected $fillable = [
        'folio', 'valor', 'descripcion',
    ];

    public function empleados (){
        return $this->belongsToMany('App\Empleado')
        ->using('App\Participante')
        ->withPivot('accion_id');
    }
    
    public function productos(){
        return $this->belongsToMany('App\Producto')
        ->using('App\MovimientoProducto')
        ->withPivot('cantidad');
    } 

    public function origen()
    {
        return $this->hasOne('App\MOrigen');
    }

    public function destino()
    {
        return $this->hasOne('App\MDestino');
    }

    protected static function boot()
    {
        parent::boot();
        self::created(function($newmovimiento){
            if (($newmovimiento->id) > 10000000) {
                $newmovimiento->update([
                    'folio' => 'M-' . $newmovimiento->id,
                ]);
            }else if (($newmovimiento->id) > 1000000) {
                $newmovimiento->update([
                    'folio' => 'M-0' . $newmovimiento->id,
                ]);
            }else if (($newmovimiento->id) > 100000) {
                $newmovimiento->update([
                    'folio' => 'M-00' . $newmovimiento->id,
                ]);
            }  else if (($newmovimiento->id) > 10000) {
                $newmovimiento->update([
                    'folio' => 'M-000' . $newmovimiento->id,
                ]);
            }else if (($newmovimiento->id) > 1000) {
                $newmovimiento->update([
                    'folio' => 'M-0000' . $newmovimiento->id,
                ]);
            }else if (($newmovimiento->id) > 100) {
                $newmovimiento->update([
                    'folio' => 'M-00000' . $newmovimiento->id,
                ]);
            } else if (($newmovimiento->id) > 10) {
                $newmovimiento->update([
                    'folio' => 'M-000000' . $newmovimiento->id,
                ]);
            }  
            else {
                $newmovimiento->update([
                    'folio' => 'M-0000000' . $newmovimiento->id,
                ]);
            }
        });
    }

    
}