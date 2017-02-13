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

    public function getEvaluaciones()
    {
        return $this->hasMany('App\Evaluaciones', 'idItem', 'id')->where('idEtapa', '=', null)->with('getOpciones');
    }

    public function getAgrupaciones()
    {
        return $this->hasMany('App\Etapas', 'idItem', 'id')->with('getEvaluaciones');
    }
}
