<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipopago extends Model
{
    protected $table ='tipopagos';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_tipopago',
    ];

    public function ventas (){
        return $this->hasMany('App\Venta');
    }

    public function pagos (){
        return $this->hasMany('App\Pago');
    }
}
