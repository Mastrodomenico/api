<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSeguro extends Model
{
    protected $table = "tipos_seguros";

    protected $fillable = [
        'nome',
        'valor'
    ];

}
