<?php

namespace App\Services\Coleta;

class ExecutorColeta
{
    /**
     * @var ContratoColetorOferta[]
     */
    private array $coletores;

    public function __construct()
    {
        $this->coletores = [
            new ColetorMercadoLivre(),
            new ColetorAmazon(),
        ];
    }

    public function coletar(): array
    {
        $ofertas = [];

        foreach ($this->coletores as $coletor) {
            $ofertas = array_merge(
                $ofertas,
                $coletor->coletar()
            );
        }

        return $ofertas;
    }
}
