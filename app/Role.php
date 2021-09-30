<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_rol', 'descripcion',
    ];

    public function usuarios(){
        return $this->hasMany('App\User');
    } 
}
