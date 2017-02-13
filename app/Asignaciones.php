<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    protected $table = 'asignaciones';

    public function getChecklistName()
    {
        return $this->hasMany('App\Checklist', 'id', 'idChecklist');
    }

    public function getBodegaInfo()
    {
        return $this->hasMany('App\Bodegas', 'id', 'idBodega');
    }
}
