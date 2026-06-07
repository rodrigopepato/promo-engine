<?php

namespace App\Services\Coleta;

use App\Models\Coleta;

class RegistradorColeta
{
    public function registrar(ResultadoColeta $resultado): Coleta
    {
        return Coleta::create([
            'executada_em' => now(),
            'total_ofertas' => $resultado->totalOfertas,
            'enviadas' => $resultado->enviadas,
            'falhas' => $resultado->falhas,
        ]);
    }
}
