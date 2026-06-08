@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-10">

        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="mb-0">Nova Promoção</h3>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Corrija os erros abaixo:</strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.promocoes.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Marketplace</label>

                        <select name="marketplace" class="form-select" required>
                            <option value="">Selecione</option>

                            <option value="amazon" @selected(old('marketplace') === 'amazon')>
                                Amazon
                            </option>

                            <option value="mercadolivre" @selected(old('marketplace') === 'mercadolivre')>
                                Mercado Livre
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Título</label>

                        <input
                            type="text"
                            name="titulo"
                            class="form-control"
                            value="{{ old('titulo') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">URL do produto / link de afiliado</label>

                        <input
                            type="url"
                            name="produto_url"
                            class="form-control"
                            value="{{ old('produto_url') }}"
                            required
                        >

                        <div class="form-text">
                            Cole aqui preferencialmente o seu link de afiliado.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço original</label>

                            <input
                                type="number"
                                step="0.01"
                                name="preco_original"
                                class="form-control"
                                value="{{ old('preco_original') }}"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço promocional</label>

                            <input
                                type="number"
                                step="0.01"
                                name="preco_promocao"
                                class="form-control"
                                value="{{ old('preco_promocao') }}"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input
                            type="checkbox"
                            name="tem_cupom"
                            value="1"
                            class="form-check-input"
                            id="temCupom"
                            @checked(old('tem_cupom'))
                        >

                        <label class="form-check-label" for="temCupom">
                            Possui cupom?
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Código do cupom</label>

                        <input
                            type="text"
                            name="cupom_codigo"
                            class="form-control"
                            value="{{ old('cupom_codigo') }}"
                        >
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.promocoes.index') }}" class="btn btn-outline-secondary">
                            Promoções publicadas
                        </a>

                        <button type="submit" class="btn btn-primary">
                            🚀 Publicar Promoção
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection
