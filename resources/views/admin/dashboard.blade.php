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
        <div class="card">
            <div class="card-body">
                <p class="text-body-secondary mb-1">Total de coletas</p>
                <h2 class="mb-0">{{ $totalColetas }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="text-body-secondary mb-1">Ofertas publicadas</p>
                <h2 class="mb-0">{{ $totalOfertasPublicadas }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <p class="text-body-secondary mb-1">Falhas</p>
                <h2 class="mb-0">{{ $totalFalhas }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2">
    <a href="{{ route('admin.promocoes.create') }}" class="btn btn-primary">
        Publicar promoção
    </a>

    <a href="{{ route('admin.promocoes.index') }}" class="btn btn-outline-secondary">
        Ver promoções publicadas
    </a>
</div>

@endsection
