<?php

namespace App\Services\MercadoLivre;

use Illuminate\Support\Facades\Http;

class MercadoLivreAuthService
{
    public function gerarUrlAutorizacao(): string
    {
        $clientId = env('MERCADOLIVRE_CLIENT_ID');
        $redirectUri = env('MERCADOLIVRE_REDIRECT_URI');

        return 'https://auth.mercadolivre.com.br/authorization?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
        ]);
    }
}
