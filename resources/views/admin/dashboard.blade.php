@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="mb-1">Dashboard</h1>

        <p class="text-body-secondary mb-0">
            Visão geral do Promo Engine
        </p>
    </div>

    <a href="{{ route('admin.promocoes.create') }}" class="btn btn-primary">
        Nova Promoção
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row g-3 mb-4">

    <div class="col-md-4">
        <div class="card border-primary shadow-sm">
            <div class="card-body">
                <p class="text-body-secondary mb-1">
                    Ofertas Publicadas
                </p>

                <h2 class="mb-0">
                    {{ $totalOfertasPublicadas }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success shadow-sm">
            <div class="card-body">
                <p class="text-body-secondary mb-1">
                    Promoções Hoje
                </p>

                <h2 class="mb-0">
                    {{ $totalPromocoesHoje }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger shadow-sm">
            <div class="card-body">
                <p class="text-body-secondary mb-1">
                    Falhas
                </p>

                <h2 class="mb-0">
                    {{ $totalFalhas }}
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">
            Últimas Promoções Publicadas
        </h5>
    </div>

    <div class="card-body">

        @if ($ultimasOfertas->isEmpty())

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
                            <th>Publicado em</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($ultimasOfertas as $oferta)

                            <tr>

                                <td>
                                    {{ $oferta->titulo }}
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

                                    <strong>
                                        R$
                                        {{ number_format($oferta->preco_atual, 2, ',', '.') }}
                                    </strong>

                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($oferta->publicado_em)->format('d/m/Y H:i') }}
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
