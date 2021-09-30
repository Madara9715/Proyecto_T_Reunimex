<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDestino extends Model
{
    protected $table ='destinos';

    protected $guarded = [];

    public function destinable()
    {
        return $this->morphTo();
    }

    public function movimiento(){
        return $this->belongsTo('App\Movimiento');
    }

}
