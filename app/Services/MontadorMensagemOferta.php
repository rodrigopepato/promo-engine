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
            default => 'Marketplace desconhecido',
        };

        if ($precoOriginal) {
            $precoFormatado = 'De R$' . number_format($precoOriginal, 2, ',', '.') .
                ' | Por R$' . number_format($precoAtual, 2, ',', '.') . ' 💰';
        } else {
            $precoFormatado = 'Por R$' . number_format($precoAtual, 2, ',', '.') . ' 💰';
        }

        $cupomFormatado = '';

        if ($temCupom) {
            if ($cupomCodigo) {
                $cupomFormatado = 'Cupom: ' . $cupomCodigo . ' ⚠️';
            } else {
                $cupomFormatado = 'Cupom disponível ⚠️';
            }
        }

        $partesMensagem = [
            $titulo,
            $precoFormatado,
        ];

        if ($cupomFormatado !== '') {
            $partesMensagem[] = $cupomFormatado;
        }

        $partesMensagem[] = '🛒 Achado no ' . $marketplaceFormatado;
        $partesMensagem[] = '👉 ' . $produtoUrl;

        return implode("\n\n", $partesMensagem);
    }
}
