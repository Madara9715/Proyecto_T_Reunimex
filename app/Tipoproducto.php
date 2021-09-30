<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoproducto extends Model
{
    protected $table ='tipoproductos';

    protected $fillable = [
        'clave','nombre_tipoP','descripcion',
    ];

    public function productos (){
        return $this->hasMany('App\Producto');
    }
}
