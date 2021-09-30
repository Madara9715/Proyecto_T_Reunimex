<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    protected $table ='deudas';

    protected $fillable = [
        'cuenta_id','venta_id','folio','valor_total','monto_abonado','monto_restante','valor_interes','fecha_limite','fecha_liquidado','activo',
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function cuenta(){
        return $this->belongsTo('App\Cuenta');
    }

    public function venta(){
        return $this->belongsTo('App\Venta');
    }

    public function pagos(){
        return $this->hasMany('App\Pago');
    }

    protected static function boot()
    {
        parent::boot();
        self::created(function($newdeuda){
            if (($newdeuda->id) > 10000000) {
                $newdeuda->update([
                    'folio' => 'D-' . $newdeuda->id,
                ]);
            }else if (($newdeuda->id) > 1000000) {
                $newdeuda->update([
                    'folio' => 'D-0' . $newdeuda->id,
                ]);
            }else if (($newdeuda->id) > 100000) {
                $newdeuda->update([
                    'folio' => 'D-00' . $newdeuda->id,
                ]);
            }  else if (($newdeuda->id) > 10000) {
                $newdeuda->update([
                    'folio' => 'D-000' . $newdeuda->id,
                ]);
            }else if (($newdeuda->id) > 1000) {
                $newdeuda->update([
                    'folio' => 'D-0000' . $newdeuda->id,
                ]);
            }else if (($newdeuda->id) > 100) {
                $newdeuda->update([
                    'folio' => 'D-00000' . $newdeuda->id,
                ]);
            } else if (($newdeuda->id) > 10) {
                $newdeuda->update([
                    'folio' => 'D-000000' . $newdeuda->id,
                ]);
            }  
            else {
                $newdeuda->update([
                    'folio' => 'D-0000000' . $newdeuda->id,
                ]);
            }
        });
    }
}
