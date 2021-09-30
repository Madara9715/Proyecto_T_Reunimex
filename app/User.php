<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_user', 'email', 'password', 'role_id' , 'activo', 'empleado_id',
    ]; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

    public function esAdmin(){
        if($this->role->nombre_rol=='administrador'){
            return true;
          }
          return false;
    }

    public function esAsesor(){
        if($this->role->nombre_rol=='asesor'){
            return true;
          }
          return false;
    }

    public function esActivo(){
        if($this->activo==1){
            return true;
          }
          return false;
    }
 
}
