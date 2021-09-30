<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MOrigen extends Model
{
    protected $table ='origenes';

    protected $guarded = [];

    public function originable()
    {
        return $this->morphTo();
    }

    public function movimiento(){
        return $this->belongsTo('App\Movimiento');
    }
}
