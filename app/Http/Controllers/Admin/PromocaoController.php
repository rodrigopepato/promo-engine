<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromocaoController extends Controller
{
    public function create()
    {
        return view('admin.promocoes.create');
    }

    public function store(Request $request)
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

        dd($dados);
    }
}
