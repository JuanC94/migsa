<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = "paginas";

    public function indicadores()
    {
        return $this->hasMany(Indicador::class);
    }
}
