<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicadores';

    public function pagina()
    {
        return $this->belongsTo(Pagina::class);
    }

    public function indices()
    {
        return $this->hasMany(Indice::class);
    }
}
