<?php

namespace App\Services;

class MontadorMensagemOferta
{
    public function montar(array $dados): string
    {
        $titulo = $dados['titulo'] ?? '';
        $produtoUrl = $dados['produto_url'] ?? '';
        $precoAtual = $dados['preco_atual'] ?? null;
        $precoOriginal = $dados['preco_original'] ?? null;
        $temCupom = $dados['tem_cupom'] ?? false;
        $cupomCodigo = $dados['cupom_codigo'] ?? null;
        $marketplace = $dados['marketplace'] ?? '';

        $marketplaceFormatado = match ($marketplace) {
            'amazon' => 'Amazon',
            'mercadolivre' => 'Mercado Livre',
            default => 'Marketplace',
        };

        $mensagem = [];

        $mensagem[] = '🔥 OFERTA ENCONTRADA';
        $mensagem[] = $titulo;

        if ($precoOriginal) {
            $mensagem[] = 'De: R$ ' . number_format($precoOriginal, 2, ',', '.');
        }

        $mensagem[] = 'Por: R$ ' . number_format($precoAtual, 2, ',', '.') . ' 💰';

        if ($temCupom) {
            if ($cupomCodigo) {
                $mensagem[] = '🎟️ Cupom: ' . $cupomCodigo;
            } else {
                $mensagem[] = '🎟️ Cupom disponível';
            }
        }

        $mensagem[] = '🛒 Loja: ' . $marketplaceFormatado;
        $mensagem[] = '👉 Comprar agora:';
        $mensagem[] = $produtoUrl;

        return implode("\n\n", $mensagem);
    }
}
