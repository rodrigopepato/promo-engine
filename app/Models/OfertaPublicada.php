<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaPublicada extends Model
{
    protected $table = 'ofertas_publicadas';

    protected $fillable = [
        'marketplace',
        'produto_id',
        'titulo',
        'produto_url',
        'preco_atual',
        'preco_original',
        'tem_cupom',
        'cupom_codigo',
        'publicado_em',
    ];
}
