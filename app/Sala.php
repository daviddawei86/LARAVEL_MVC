<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //
    protected $table = "sala";
   // protected $primaryKey = 'id_sala';
    
    
    public function locals()
    {
        return $this->belongsTo('App\Local');
    }
    
    
}
