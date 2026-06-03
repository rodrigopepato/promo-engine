<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Coleta\ExecutarColetaOferta;
use App\Services\Publicacao\EnviadorOfertaN8n;

class ColetorOfertaController extends Controller
{
    public function enviar(Request $request, EnviadorOfertaN8n $enviadorOfertaN8n)
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

        $response = $enviadorOfertaN8n->enviar($oferta);

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Oferta enviada para o n8n.',
            'status_n8n' => $response->status(),
            'resposta_n8n' => $response->json(),
        ]);
    }

    public function executar(ExecutarColetaOferta $executarColetaOferta)
    {
        $resultado = $executarColetaOferta->executar();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Coleta executada com sucesso.',
            ...$resultado->toArray(),
        ]);
    }
}
