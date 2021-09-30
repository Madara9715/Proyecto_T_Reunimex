<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table ='estados';
    protected $fillable = ['clave','nombre_estado', 'abreviacion','activo'];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }

    public function municipios (){
        return $this->hasMany('App\Municipio');
    }

    public function direcciones()
    {
        return $this->hasMany('App\Direccione');
    }

}
