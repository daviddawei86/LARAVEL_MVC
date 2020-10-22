<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usersmovies extends Model
{
      
        use HasCompositeKey;
        protected $primaryKey = ['id_movie', 'id_client'];
}
