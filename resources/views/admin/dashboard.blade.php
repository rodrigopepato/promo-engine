<h1>Admin Promo Engine</h1>

@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('admin.promocoes.create') }}">
    Nova Promoção
</a>

<p>Total de coletas: {{ $totalColetas }}</p>
<p>Total de ofertas publicadas: {{ $totalOfertasPublicadas }}</p>
<p>Total de falhas: {{ $totalFalhas }}</p>
