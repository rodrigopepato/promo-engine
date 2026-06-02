<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessarOfertaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'marketplace' => ['required', 'in:amazon,mercadolivre'],
            'produto_id' => ['required', 'string'],
            'titulo' => ['required', 'string'],
            'produto_url' => ['required', 'url'],
            'preco_atual' => ['required', 'numeric'],
            'tem_cupom' => ['required', 'boolean'],

            'preco_original' => ['nullable', 'numeric'],
            'cupom_codigo' => ['nullable', 'string'],
            'collected_at' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'marketplace.required' => 'O campo marketplace é obrigatório.',
            'marketplace.in' => 'O marketplace deve ser amazon ou mercadolivre.',

            'produto_id.required' => 'O campo produto_id é obrigatório.',
            'produto_id.string' => 'O campo produto_id deve ser texto.',

            'titulo.required' => 'O campo titulo é obrigatório.',
            'titulo.string' => 'O campo titulo deve ser texto.',

            'produto_url.required' => 'O campo produto_url é obrigatório.',
            'produto_url.url' => 'O campo produto_url deve ser uma URL válida.',

            'preco_atual.required' => 'O campo preco_atual é obrigatório.',
            'preco_atual.numeric' => 'O campo preco_atual deve ser numérico.',

            'tem_cupom.required' => 'O campo tem_cupom é obrigatório.',
            'tem_cupom.boolean' => 'O campo tem_cupom deve ser verdadeiro ou falso.',

            'preco_original.numeric' => 'O campo preco_original deve ser numérico.',
            'cupom_codigo.string' => 'O campo cupom_codigo deve ser texto.',
            'collected_at.date' => 'O campo collected_at deve ser uma data válida.',
        ];
    }
}
