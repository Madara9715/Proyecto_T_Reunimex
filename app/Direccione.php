<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    protected $table ='direcciones';

    protected $guarded = [];

    public function direccionable()
    {
        return $this->morphTo();
    }

    public function estado(){
        return $this->belongsTo('App\Estado');
    }

    public function municipio(){
        return $this->belongsTo('App\Municipio');
    }

}
