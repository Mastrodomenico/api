<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table = 'temas';

    protected $fillable = [
        'cor_1',
        'cor_2',
        'cor_3'
    ];
}
