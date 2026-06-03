<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Coleta\ExecutarColetaOferta;
use Illuminate\Support\Facades\Log;

class ColetarOfertasCommand extends Command
{
    protected $signature = 'ofertas:coletar';

    protected $description = 'Executa a coleta de ofertas e envia para o n8n.';

    public function handle(ExecutarColetaOferta $executarColetaOferta): int
    {
        $resultado = $executarColetaOferta->executar();

        $this->info('Coleta executada com sucesso.');
        $this->info('Total de ofertas coletadas: ' . $resultado->totalOfertas);
        $this->info('Ofertas enviadas: ' . $resultado->enviadas);
        $this->info('Falhas no envio: ' . $resultado->falhas);

        Log::info('Coleta de ofertas executada.', $resultado->toArray());

        return self::SUCCESS;
    }
}
