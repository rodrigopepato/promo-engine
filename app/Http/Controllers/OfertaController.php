<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessarOfertaRequest;
use App\Services\MontadorMensagemOferta;
use App\Services\ValidadorPublicacaoOferta;
use App\Services\RegistradorOfertaPublicada;

class OfertaController extends Controller
{
    public function processar(
        ProcessarOfertaRequest $request,
        MontadorMensagemOferta $montadorMensagemOferta,
        ValidadorPublicacaoOferta $validadorPublicacaoOferta,
        RegistradorOfertaPublicada $registradorOfertaPublicada
    ) {
        $dados = $request->validated();

        if (! $validadorPublicacaoOferta->podePublicar($dados)) {
            return response()->json([
                'sucesso' => false,
                'publicar' => false,
                'motivo' => 'Oferta já publicada nas últimas 24 horas.',
            ]);
        }

        $marketplaceFormatado = match ($dados['marketplace']) {
            'amazon' => 'Amazon',
            'mercadolivre' => 'Mercado Livre',
            default => 'Marketplace desconhecido',
        };

        $mensagemFinal = $montadorMensagemOferta->montar($dados);

        $registradorOfertaPublicada->registrar($dados);

        return response()->json([
            'sucesso' => true,
            'publicar' => true,
            'mensagem' => $mensagemFinal,
            'publicacao' => [
                'titulo' => $dados['titulo'],
                'marketplace' => $dados['marketplace'],
                'marketplace_formatado' => $marketplaceFormatado,
                'produto_id' => $dados['produto_id'],
                'produto_url' => $dados['produto_url'],
                'preco_atual' => $dados['preco_atual'],
                'preco_original' => $dados['preco_original'] ?? null,
                'tem_cupom' => $dados['tem_cupom'],
                'cupom_codigo' => $dados['cupom_codigo'] ?? null,
                'collected_at' => $dados['collected_at'] ?? null,
            ],
        ]);
    }
}
