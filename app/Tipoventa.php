<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoventa extends Model
{
    protected $table ='tipoventas';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_tipoV',
    ];

    public function ventas (){
        return $this->hasMany('App\Venta');
    }

}
