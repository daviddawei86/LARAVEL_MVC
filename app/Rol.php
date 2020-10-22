<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Rol extends Model
{
    //
    protected $table = "rol";
    
    
     use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'users.name' => 10,
         
        ]
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
