<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfilamiento extends Model
{
    protected $table = 'perfilamientos';

    public function getUsers()
    {
        return $this->hasMany('App\User', 'id', 'idUsuario');
    }
}
