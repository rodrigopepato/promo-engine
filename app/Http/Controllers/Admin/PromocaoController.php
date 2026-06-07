<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Publicacao\EnviadorOfertaN8n;
use App\Models\OfertaPublicada;

class PromocaoController extends Controller
{

    public function index()
    {
        $ofertas = OfertaPublicada::latest()
            ->limit(50)
            ->get();

        return view('admin.promocoes.index', [
            'ofertas' => $ofertas,
        ]);
    }
    public function create()
    {
        return view('admin.promocoes.create');
    }

    public function store(Request $request, EnviadorOfertaN8n $enviadorOfertaN8n)
    {
        $dados = $request->validate([
            'marketplace' => ['required', 'in:amazon,mercadolivre'],
            'titulo' => ['required', 'string', 'max:255'],
            'produto_url' => ['required', 'url'],
            'preco_original' => ['nullable', 'numeric', 'min:0'],
            'preco_promocao' => ['required', 'numeric', 'min:0'],
            'tem_cupom' => ['nullable', 'boolean'],
            'cupom_codigo' => ['nullable', 'string', 'max:50'],
        ]);

        $oferta = [
            'marketplace' => $dados['marketplace'],
            'produto_id' => 'ADMIN-' . md5($dados['produto_url']),
            'titulo' => $dados['titulo'],
            'produto_url' => $dados['produto_url'],
            'preco_original' => $dados['preco_original'] ?? null,
            'preco_atual' => $dados['preco_promocao'],
            'tem_cupom' => $request->boolean('tem_cupom'),
            'cupom_codigo' => $dados['cupom_codigo'] ?? null,
            'origem' => 'admin',
            'coletado_em' => now()->toDateTimeString(),
        ];

        $enviadorOfertaN8n->enviar($oferta);

        return redirect()
            ->route('admin.promocoes.create')
            ->with('success', 'Promoção publicada com sucesso. Você já pode cadastrar a próxima.');
    }
}
