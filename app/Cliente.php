<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ='clientes';

    protected $fillable = [
        'tipocliente_id','clave','nombre_cliente', 'apellido_p','apellido_m','telefono_fijo','telefono_movil','direccion','activo'
    ];

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
    
    public function tipocliente(){
        return $this->belongsTo('App\Tipocliente');
    }

    public function pedidos(){
        return $this->hasMany('App\Pedido');
    }

    public function cuentas(){
        return $this->hasMany('App\Cuenta');
    }

    public function alerta(){
        return $this->hasOneThrough('App\Alerta','App\Cuenta');
    }

    public function ventas(){
        return $this->hasMany('App\Venta');
    }

    public function empleados(){
        return $this->belongsToMany('App\Empleado')
        ->using('App\ClienteEmpleado')
        ->withTimestamps()
        ->withPivot('activo');
    }

    public function deudas(){
        return $this->hasManyThrough('App\Deuda','App\Cuenta');
    }

    public function direcciones()
    {
        return $this->morphMany('App\Direccione','direccionable');
    }
    protected static function boot()
    {
        parent::boot();
        self::created(function($newcliente){
            if (($newcliente->id) > 1000) {
                $newcliente->update([
                    'clave' => 'CL-' . $newcliente->id,
                ]);
            }else if (($newcliente->id) > 100) {
                $newcliente->update([
                    'clave' => 'CL-0' . $newcliente->id,
                ]);
            } else if (($newcliente->id) > 10) {
                $newcliente->update([
                    'clave' => 'CL-00' . $newcliente->id,
                ]);
            }  
            else {
                $newcliente->update([
                    'clave' => 'CL-000' . $newcliente->id,
                ]);
            }
        });
    }

}
