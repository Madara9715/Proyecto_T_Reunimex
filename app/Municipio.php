<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table ='municipios';

    protected $fillable = ['clave','nombre_municipio', 'activo','estado_id'];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function estado(){
        return $this->belongsTo('App\Estado');
    }

    public function direcciones()
    {
        return $this->hasMany('App\Direccione');
    }
}
