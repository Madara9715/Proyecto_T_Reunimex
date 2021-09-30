<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    public $timestamps = false;

    protected $fillable = [
        'clave','nombre_departamento', 'descripcion',
    ];

    public function empleados()
    {
        return $this->hasMany('App\Empleado');
    }

    protected static function boot()
    {
        parent::boot();
        self::created(function($newdepartamento){
            if (($newdepartamento->id) < 10) {
                $newdepartamento->update([
                    'clave' => 'D-00' . $newdepartamento->id,
                ]);
            } else if (($newdepartamento->id) < 100) {
                $newdepartamento->update([
                    'clave' => 'D-0' . $newdepartamento->id,
                ]);
            } else {
                $newdepartamento->update([
                    'clave' => 'D-' . $newdepartamento->id,
                ]);
            }
        });
    }
}
