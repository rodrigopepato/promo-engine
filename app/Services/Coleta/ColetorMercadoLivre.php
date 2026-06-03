<?php

namespace App\Services\Coleta;

class ColetorMercadoLivre implements ContratoColetorOferta
{
    public function coletar(): array
    {
        return [
            [
                'marketplace' => 'mercadolivre',
                'produto_id' => 'ML-MOCK-001',
                'titulo' => 'Smartwatch Xiaomi Mi Band 8',
                'produto_url' => 'https://meli.la/smartwatch-teste',
                'preco_original' => 299.90,
                'preco_atual' => 199.90,
                'tem_cupom' => false,
            ],
        ];
    }
}
