<?php

namespace App\Services\Coleta;

class ColetorAmazon implements ContratoColetorOferta
{
    public function coletar(): array
    {
        return [
            [
                'marketplace' => 'amazon',
                'produto_id' => 'AMZ-MOCK-001',
                'titulo' => 'Echo Dot 5ª Geração',
                'produto_url' => 'https://amazon.com.br/echo-dot-teste',
                'preco_original' => 399.90,
                'preco_atual' => 279.90,
                'tem_cupom' => false,
            ],
        ];
    }
}
