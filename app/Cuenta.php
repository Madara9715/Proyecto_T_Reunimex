<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table ='cuentas';

    protected $fillable = [
        'folio','cliente_id','valor_total','monto_abonado','monto_restante','valor_interes','activo',
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

    public function alerta(){
        return $this->hasOne('App\Alerta');
    }

    public function deudas(){
        return $this->hasMany('App\Deuda');
    }

    public function pagos(){
        return $this->hasManyThrough('App\Pago','App\Deuda');
    }
    protected static function boot()
    {
        parent::boot();
        self::created(function($newcuenta){
            if (($newcuenta->id) > 10000000) {
                $newcuenta->update([
                    'folio' => 'C-' . $newcuenta->id,
                ]);
            }else if (($newcuenta->id) > 1000000) {
                $newcuenta->update([
                    'folio' => 'C-0' . $newcuenta->id,
                ]);
            }else if (($newcuenta->id) > 100000) {
                $newcuenta->update([
                    'folio' => 'C-00' . $newcuenta->id,
                ]);
            }  else if (($newcuenta->id) > 10000) {
                $newcuenta->update([
                    'folio' => 'C-000' . $newcuenta->id,
                ]);
            }else if (($newcuenta->id) > 1000) {
                $newcuenta->update([
                    'folio' => 'C-0000' . $newcuenta->id,
                ]);
            }else if (($newcuenta->id) > 100) {
                $newcuenta->update([
                    'folio' => 'C-00000' . $newcuenta->id,
                ]);
            } else if (($newcuenta->id) > 10) {
                $newcuenta->update([
                    'folio' => 'C-000000' . $newcuenta->id,
                ]);
            }  
            else {
                $newcuenta->update([
                    'folio' => 'C-0000000' . $newcuenta->id,
                ]);
            }
        });
    }

}
