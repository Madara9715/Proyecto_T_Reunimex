<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table ='empleados';

    protected $fillable = [
             'tipoempleado_id' ,'departamento_id' ,	'clave' ,	'nombre_empleado' ,
                 'apellido_p' ,	'apellido_m', 	'telefono_fijo' ,	'telefono_movil' ,	'direccion' ,
                 	'correo_electronico', 	'fecha_nacimiento', 	'edad', 	'sexo' 	,'foto' ,	'activo', 
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }


    public function tipoempleado(){
        return $this->belongsTo('App\Tipoempleado');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento');
    }

    public function salarios (){
        return $this->hasMany('App\Salario');
    }

    public function clientes (){
        return $this->belongsToMany('App\Cliente')
        ->using('App\ClienteEmpleado')
        ->withTimestamps()
        ->withPivot('activo');
    }

    public function inventario()
    {
        return $this->hasOne('App\Inventario');
    }

    public function pedidos(){
        return $this->hasMany('App\Pedido');
    }

    public function cuentas(){
        return $this->hasManyThrough('App\Cuenta',
                                     'App\ClienteEmpleado',
                                     'empleado_id',
                                     'cliente_id',
                                     'id',
                                     'cliente_id');
    }

    public function ventas(){
        return $this->hasMany('App\Venta');
    }

    public function direcciones()
    {
        return $this->morphMany('App\Direccione','direccionable');
    }

    public function movimientos (){
        return $this->belongsToMany('App\Movimiento')
        ->using('App\Participante')
        ->withPivot('accion_id');
    }

    protected static function boot()
    {
        parent::boot();
        self::created(function($newempleado){
            if (($newempleado->id) > 1000) {
                $newempleado->update([
                    'clave' => 'E-' . $newempleado->id,
                ]);
            }else if (($newempleado->id) > 100) {
                $newempleado->update([
                    'clave' => 'E-0' . $newempleado->id,
                ]);
            } else if (($newempleado->id) > 10) {
                $newempleado->update([
                    'clave' => 'E-00' . $newempleado->id,
                ]);
            }  
            else {
                $newempleado->update([
                    'clave' => 'E-000' . $newempleado->id,
                ]);
            }
        });
    }
}
