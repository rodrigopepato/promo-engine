<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coleta extends Model
{
    protected $fillable = [
        'executada_em',
        'total_ofertas',
        'enviadas',
        'falhas',
    ];

    protected $casts = [
        'executada_em' => 'datetime',
    ];
}
