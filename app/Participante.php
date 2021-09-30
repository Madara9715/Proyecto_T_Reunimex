<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participante extends Pivot
{
    protected $table ='empleado_movimiento';
    public $timestamps = false;

    protected $fillable = [
        'movimiento_id','empleado_id','accion_id',
    ];

    public function movimiento(){
        return $this->belongsTo('App\Movimiento');
    }

    public function empleado(){
        return $this->belongsTo('App\Empleado');
    }

    public function accion(){
        return $this->belongsTo('App\Accione');
    }
}
