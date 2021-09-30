<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accione extends Model
{
    protected $table ='acciones';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_accion',
    ];

}
