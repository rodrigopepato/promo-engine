<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ColetorOfertaController extends Controller
{
    public function enviar(Request $request)
    {
        $oferta = $request->validate([
            'marketplace' => ['required', 'in:amazon,mercadolivre'],
            'produto_id' => ['required', 'string'],
            'titulo' => ['required', 'string'],
            'produto_url' => ['required', 'url'],
            'preco_atual' => ['required', 'numeric'],
            'tem_cupom' => ['required', 'boolean'],

            'preco_original' => ['nullable', 'numeric'],
            'cupom_codigo' => ['nullable', 'string'],
            'collected_at' => ['nullable', 'date'],
        ]);

        $response = Http::post(
            env('N8N_WEBHOOK_OFERTAS_URL'),
            $oferta
        );

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Oferta enviada para o n8n.',
            'status_n8n' => $response->status(),
            'resposta_n8n' => $response->json(),
        ]);
    }
}
