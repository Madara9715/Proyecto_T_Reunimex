<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacione extends Model
{
    protected $table ='operaciones';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_operacion', 'descripcion',
    ];

    public function movimientos (){
        return $this->hasMany('App\Movimiento');
    }
    
}
