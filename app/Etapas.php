<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapas extends Model
{
    protected $table = 'etapas';


    public function getEvaluaciones()
    {
        return $this->hasMany('App\Evaluaciones', 'idEtapa', 'id')->with('getOpciones');
    }
}
