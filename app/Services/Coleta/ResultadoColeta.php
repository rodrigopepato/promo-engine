<?php

namespace App\Services\Coleta;

class ResultadoColeta
{
    public function __construct(
        public int $totalOfertas,
        public int $enviadas,
        public int $falhas,
        public array $ofertas,
    ) {
    }

    public function toArray(): array
    {
        return [
            'total_ofertas' => $this->totalOfertas,
            'enviadas' => $this->enviadas,
            'falhas' => $this->falhas,
            'ofertas' => $this->ofertas,
        ];
    }
}
