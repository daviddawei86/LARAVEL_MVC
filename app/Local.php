<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    //Una prueba
    protected $table = "local";

     public function salas()
    {
        return $this->hasMany(Sala::class);
    }

    
    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}