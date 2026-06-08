@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="mb-1">Promoções Publicadas</h1>
        <p class="text-body-secondary mb-0">
            Histórico das ofertas enviadas para o Telegram.
        </p>
    </div>

    <a href="{{ route('admin.promocoes.create') }}" class="btn btn-primary">
        Nova Promoção
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">
                    <label class="form-label">
                        Marketplace
                    </label>

                    <select name="marketplace" class="form-select">
                        <option value="">
                            Todos
                        </option>

                        <option
                            value="amazon"
                            @selected(request('marketplace') === 'amazon')
                        >
                            Amazon
                        </option>

                        <option
                            value="mercadolivre"
                            @selected(request('marketplace') === 'mercadolivre')
                        >
                            Mercado Livre
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Título
                    </label>

                    <input
                        type="text"
                        name="titulo"
                        class="form-control"
                        value="{{ request('titulo') }}"
                        placeholder="Pesquisar promoção..."
                    >
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Filtrar
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        @if ($ofertas->isEmpty())

            <div class="alert alert-info mb-0">
                Nenhuma promoção publicada ainda.
            </div>

        @else

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Marketplace</th>
                            <th>Preço</th>
                            <th>Cupom</th>
                            <th>Publicado em</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ofertas as $oferta)
                            <tr>
                                <td>
                                    <strong>{{ $oferta->titulo }}</strong>

                                    <br>
@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="mb-1">Promoções Publicadas</h1>
        <p class="text-body-secondary mb-0">
            Histórico das ofertas enviadas para o Telegram.
        </p>
    </div>

    <a href="{{ route('admin.promocoes.create') }}" class="btn btn-primary">
        Nova Promoção
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">
                    <label class="form-label">
                        Marketplace
                    </label>

                    <select name="marketplace" class="form-select">
                        <option value="">
                            Todos
                        </option>

                        <option
                            value="amazon"
                            @selected(request('marketplace') === 'amazon')
                        >
                            Amazon
                        </option>

                        <option
                            value="mercadolivre"
                            @selected(request('marketplace') === 'mercadolivre')
                        >
                            Mercado Livre
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Título
                    </label>

                    <input
                        type="text"
                        name="titulo"
                        class="form-control"
                        value="{{ request('titulo') }}"
                        placeholder="Pesquisar promoção..."
                    >
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Filtrar
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        @if ($ofertas->isEmpty())

            <div class="alert alert-info mb-0">
                Nenhuma promoção publicada ainda.
            </div>

        @else

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Marketplace</th>
                            <th>Preço</th>
                            <th>Cupom</th>
                            <th>Publicado em</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ofertas as $oferta)
                            <tr>
                                <td>
                                    <strong>{{ $oferta->titulo }}</strong>

                                    <br>

                                   <td>
                                        <strong>{{ $oferta->titulo }}</strong>
                                    </td>
                                </td>

                                <td>
                                    @if ($oferta->marketplace === 'amazon')
                                        <span class="badge text-bg-warning">
                                            Amazon
                                        </span>
                                    @elseif ($oferta->marketplace === 'mercadolivre')
                                        <span class="badge text-bg-info">
                                            Mercado Livre
                                        </span>
                                    @else
                                        <span class="badge text-bg-secondary">
                                            {{ $oferta->marketplace }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($oferta->preco_original)
                                        <small class="text-body-secondary">
                                            De R$ {{ number_format($oferta->preco_original, 2, ',', '.') }}
                                        </small>

                                        <br>
                                    @endif

                                    <strong>
                                        R$ {{ number_format($oferta->preco_atual, 2, ',', '.') }}
                                    </strong>
                                </td>

                                <td>
                                    @if ($oferta->tem_cupom)
                                        <span class="badge text-bg-success">
                                            {{ $oferta->cupom_codigo ?: 'Disponível' }}
                                        </span>
                                    @else
                                        <span class="text-body-secondary">
                                            -
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($oferta->publicado_em)->format('d/m/Y H:i') }}
                                </td>

                                <td class="text-end">
                                    <a
                                        href="{{ $oferta->produto_url }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-secondary"
                                    >
                                        Abrir produto
                                    </a>
                                </td>
                            </tr>
                        @endforeach@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="mb-1">Promoções Publicadas</h1>
        <p class="text-body-secondary mb-0">
            Histórico das ofertas enviadas para o Telegram.
        </p>
    </div>

    <a href="{{ route('admin.promocoes.create') }}" class="btn btn-primary">
        Nova Promoção
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">
                    <label class="form-label">
                        Marketplace
                    </label>

                    <select name="marketplace" class="form-select">
                        <option value="">
                            Todos
                        </option>

                        <option
                            value="amazon"
                            @selected(request('marketplace') === 'amazon')
                        >
                            Amazon
                        </option>

                        <option
                            value="mercadolivre"
                            @selected(request('marketplace') === 'mercadolivre')
                        >
                            Mercado Livre
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Título
                    </label>

                    <input
                        type="text"
                        name="titulo"
                        class="form-control"
                        value="{{ request('titulo') }}"
                        placeholder="Pesquisar promoção..."
                    >
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Filtrar
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        @if ($ofertas->isEmpty())

            <div class="alert alert-info mb-0">
                Nenhuma promoção publicada ainda.
            </div>

        @else

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Marketplace</th>
                            <th>Preço</th>
                            <th>Cupom</th>
                            <th>Publicado em</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ofertas as $oferta)
                            <tr>
                                <td>
                                    <strong>{{ $oferta->titulo }}</strong>

                                    <br>
                                </td>

                                <td>
                                    @if ($oferta->marketplace === 'amazon')
                                        <span class="badge text-bg-warning">
                                            Amazon
                                        </span>
                                    @elseif ($oferta->marketplace === 'mercadolivre')
                                        <span class="badge text-bg-info">
                                            Mercado Livre
                                        </span>
                                    @else
                                        <span class="badge text-bg-secondary">
                                            {{ $oferta->marketplace }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($oferta->preco_original)
                                        <small class="text-body-secondary">
                                            De R$ {{ number_format($oferta->preco_original, 2, ',', '.') }}
                                        </small>

                                        <br>
                                    @endif

                                    <strong>
                                        R$ {{ number_format($oferta->preco_atual, 2, ',', '.') }}
                                    </strong>
                                </td>

                                <td>
                                    @if ($oferta->tem_cupom)
                                        <span class="badge text-bg-success">
                                            {{ $oferta->cupom_codigo ?: 'Disponível' }}
                                        </span>
                                    @else
                                        <span class="text-body-secondary">
                                            -
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($oferta->publicado_em)->format('d/m/Y H:i') }}
                                </td>

                                <td class="text-end">
                                    <a
                                        href="{{ $oferta->produto_url }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-secondary"
                                    >
                                        Abrir produto
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($oferta->publicado_em)->format('d/m/Y H:i') }}
                                </td>

                                <td class="text-end">
                                    <a
                                        href="{{ $oferta->produto_url }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-secondary"
                                    >
                                        Abrir produto
                                    </a>
                                </td>
                </table>
            </div>

        @endif

    </div>
</div>

@endsection

                    </tbody>

                </table>
            </div>

        @endif

    </div>
</div>

@endsection

                                    <small class="text-body-secondary">
                                        {{ $oferta->produto_id }}
                                    </small>
                                </td>

                                <td>
                                    @if ($oferta->marketplace === 'amazon')
                                        <span class="badge text-bg-warning">
                                            Amazon
                                        </span>
                                    @elseif ($oferta->marketplace === 'mercadolivre')
                                        <span class="badge text-bg-info">
                                            Mercado Livre
                                        </span>
                                    @else
                                        <span class="badge text-bg-secondary">
                                            {{ $oferta->marketplace }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($oferta->preco_original)
                                        <small class="text-body-secondary">
                                            De R$ {{ number_format($oferta->preco_original, 2, ',', '.') }}
                                        </small>

                                        <br>
                                    @endif

                                    <strong>
                                        R$ {{ number_format($oferta->preco_atual, 2, ',', '.') }}
                                    </strong>
                                </td>

                                <td>
                                    @if ($oferta->tem_cupom)
                                        <span class="badge text-bg-success">
                                            {{ $oferta->cupom_codigo ?: 'Disponível' }}
                                        </span>
                                    @else
                                        <span class="text-body-secondary">
                                            -
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($oferta->publicado_em)->format('d/m/Y H:i') }}
                                </td>

                                <td class="text-end">
                                    <a
                                        href="{{ $oferta->produto_url }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-secondary"
                                    >
                                        Abrir produto
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        @endif

    </div>
</div>

@endsection
