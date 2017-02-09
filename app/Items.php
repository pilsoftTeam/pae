<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';

    public function getEtapas()
    {
        return $this->hasMany('App\Etapas', 'idItem', 'id');
    }
}
