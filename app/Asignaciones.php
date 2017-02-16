<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    protected $table = 'asignaciones';

    public function getChecklistName()
    {
        return $this->hasOne('App\Checklist', 'id', 'idChecklist');
    }

    public function getBodegaInfo()
    {
        return $this->hasOne('App\Bodegas', 'id', 'idBodega');
    }

    public function getRevisor()
    {
        return $this->hasOne('App\User', 'id', 'idRevisor');
    }

    public function getSuper()
    {
        return $this->hasOne('App\User', 'id', 'idDesignador');
    }
}
