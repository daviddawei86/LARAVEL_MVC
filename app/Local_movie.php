<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local_movie extends Model
{
    use HasCompositeKey;
    protected $primaryKey = ['id_local', 'id_movie'];
}
