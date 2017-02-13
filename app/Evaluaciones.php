<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    protected $table = 'evaluaciones';


    public function getOpciones()
    {
        return $this->hasMany('App\EstadosCumplimiento', 'id', 'idOpcionCumplimiento');
    }
}
