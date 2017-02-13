<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklists';

    public function getItems()
    {
        return $this->hasMany('App\Items', 'idChecklist', 'id')->with('getEvaluaciones', 'getAgrupaciones');
    }


}
