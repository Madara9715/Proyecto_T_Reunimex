<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table ='pagos';

    protected $fillable = [
        'deuda_id','numero_pago','folio','tipopago_id','saldo_anterior','monto_abonado','saldo_actual','detalles',
    ];
    
    public function deuda(){
        return $this->belongsTo('App\Deuda');
    }

    public function tipopago()
    {
        return $this->belongsTo('App\Tipopago');
    }
    
    protected static function boot()
    {
        parent::boot();
        self::created(function($newpago){
            if (($newpago->id) > 10000000) {
                $newpago->update([
                    'folio' => 'P-' . $newpago->id,
                ]);
            }else if (($newpago->id) > 1000000) {
                $newpago->update([
                    'folio' => 'P-0' . $newpago->id,
                ]);
            }else if (($newpago->id) > 100000) {
                $newpago->update([
                    'folio' => 'P-00' . $newpago->id,
                ]);
            }  else if (($newpago->id) > 10000) {
                $newpago->update([
                    'folio' => 'P-000' . $newpago->id,
                ]);
            }else if (($newpago->id) > 1000) {
                $newpago->update([
                    'folio' => 'P-0000' . $newpago->id,
                ]);
            }else if (($newpago->id) > 100) {
                $newpago->update([
                    'folio' => 'P-00000' . $newpago->id,
                ]);
            } else if (($newpago->id) > 10) {
                $newpago->update([
                    'folio' => 'P-000000' . $newpago->id,
                ]);
            }  
            else {
                $newpago->update([
                    'folio' => 'P-0000000' . $newpago->id,
                ]);
            }
        });
    }

}
