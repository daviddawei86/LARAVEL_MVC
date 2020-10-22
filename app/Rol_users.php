<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol_users extends Model {

    use HasCompositeKey;
    protected $primaryKey = ['id_users', 'id_rol'];

}
