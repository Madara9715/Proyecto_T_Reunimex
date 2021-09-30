<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $table ='alertas';

    protected $fillable = [
        'cuenta_id','valor', 'activo',
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
}
