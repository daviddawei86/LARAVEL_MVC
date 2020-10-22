<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Movie extends Model {

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'movies.title' => 10,
         
        ]
    ];
   
    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function locals() {
        return $this->belongsToMany(Local::class);
    }

}
