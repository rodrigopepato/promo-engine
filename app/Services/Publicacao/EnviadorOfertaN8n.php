<?php

namespace App\Services\Publicacao;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EnviadorOfertaN8n
{
    public function enviar(array $oferta): Response
    {
        $url = env('N8N_WEBHOOK_OFERTAS_URL');

        if (! $url) {
            throw new \RuntimeException('A variável N8N_WEBHOOK_OFERTAS_URL não está configurada.');
        }

        try {
            $response = Http::post($url, $oferta);

            Log::info('Oferta enviada para o n8n.', [
                'marketplace' => $oferta['marketplace'] ?? null,
                'produto_id' => $oferta['produto_id'] ?? null,
                'status_n8n' => $response->status(),
            ]);

            return $response;
        } catch (\Throwable $exception) {
            Log::error('Erro ao enviar oferta para o n8n.', [
                'marketplace' => $oferta['marketplace'] ?? null,
                'produto_id' => $oferta['produto_id'] ?? null,
                'erro' => $exception->getMessage(),
            ]);

            throw $exception;
        }
    }
}
