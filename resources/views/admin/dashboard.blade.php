@extends('layouts.admin')

@section('content')

<h1>Dashboard</h1>

@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<p>Total de coletas: <strong>{{ $totalColetas }}</strong></p>
<p>Total de ofertas publicadas: <strong>{{ $totalOfertasPublicadas }}</strong></p>
<p>Total de falhas: <strong>{{ $totalFalhas }}</strong></p>

<a href="{{ route('admin.promocoes.create') }}" class="btn">
    Nova Promoção
</a>

<a href="{{ route('admin.promocoes.index') }}" class="btn btn-secondary">
    Ver Promoções Publicadas
</a>

@endsection
