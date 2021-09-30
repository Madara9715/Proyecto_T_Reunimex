<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipocliente extends Model
{
    protected $table ='tipoclientes';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_tipoC', 'descripcion',
    ];
    
    public function clientes (){
        return $this->hasMany('App\Cliente');
    }
}
