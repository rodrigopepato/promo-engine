<?php

namespace App\Services;

use App\Models\OfertaPublicada;
use Carbon\Carbon;

class RegistradorOfertaPublicada
{
    public function registrar(array $dados): OfertaPublicada
    {
        return OfertaPublicada::create([
            'marketplace' => $dados['marketplace'],
            'produto_id' => $dados['produto_id'],
            'titulo' => $dados['titulo'],
            'produto_url' => $dados['produto_url'],
            'preco_atual' => $dados['preco_atual'],
            'preco_original' => $dados['preco_original'] ?? null,
            'tem_cupom' => $dados['tem_cupom'],
            'cupom_codigo' => $dados['cupom_codigo'] ?? null,
            'publicado_em' => Carbon::now(),
        ]);
    }
}
