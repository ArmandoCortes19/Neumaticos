<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Neumatico extends Model
{
    protected $fillable = [
        'codigo',
        'marca',
        'medida',
        'estado',
        'area',
        'observaciones',
    ];
}
