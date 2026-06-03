<?php

namespace App\Services\Coleta;

use App\Services\Publicacao\EnviadorOfertaN8n;

class ExecutarColetaOferta
{
    public function __construct(
        private ExecutorColeta $executorColeta,
        private EnviadorOfertaN8n $enviadorOfertaN8n,
    ) {
    }

    public function executar(): ResultadoColeta
    {
        $ofertas = $this->executorColeta->coletar();

        $enviadas = 0;
        $falhas = 0;

        foreach ($ofertas as $oferta) {
            try {
                $this->enviadorOfertaN8n->enviar($oferta);
                $enviadas++;
            } catch (\Throwable $exception) {
                $falhas++;
            }
        }

        return new ResultadoColeta(
            totalOfertas: count($ofertas),
            enviadas: $enviadas,
            falhas: $falhas,
            ofertas: $ofertas,
        );
    }
}
