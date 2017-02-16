<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    protected $table = 'resultados';

    public function getEvaluaciones()
    {
        return $this->hasOne('App\Evaluaciones', 'id', 'idEvaluacion');
    }

    public function getItems()
    {
        return $this->hasOne('App\Items', 'id', 'idItem')->with('getAgrupaciones', 'getEvaluaciones');
    }
}
