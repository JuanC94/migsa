<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indice extends Model
{
    protected $table = 'indices';

    public function indicador()
    {
        return $this->belongsTo(Indicador::class);
    }
}
