<?php

namespace App\Services\Coleta;

class ColetorOfertaTeste implements ContratoColetorOferta
{
    public function coletar(): array
    {
        return [
            [
                'marketplace' => 'mercadolivre',
                'produto_id' => 'COLETA-TESTE-001',
                'titulo' => 'Fone Bluetooth JBL Tune 520BT',
                'produto_url' => 'https://meli.la/fone-jbl-teste',
                'preco_original' => 299.90,
                'preco_atual' => 199.90,
                'tem_cupom' => false,
            ],
        ];
    }
}
