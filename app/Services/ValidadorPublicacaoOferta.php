<?php

namespace App\Services;

use App\Models\OfertaPublicada;
use Carbon\Carbon;

class ValidadorPublicacaoOferta
{
    public function podePublicar(array $dados): bool
    {
        return ! OfertaPublicada::where('marketplace', $dados['marketplace'])
            ->where('produto_id', $dados['produto_id'])
            ->where('publicado_em', '>=', Carbon::now()->subHours(24))
            ->exists();
    }
}
