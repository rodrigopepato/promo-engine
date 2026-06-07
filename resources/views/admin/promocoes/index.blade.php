<h1>Promoções Publicadas</h1>

<a href="{{ route('admin.dashboard') }}">Voltar para o dashboard</a>
<br>
<a href="{{ route('admin.promocoes.create') }}">Nova Promoção</a>

@if ($ofertas->isEmpty())
    <p>Nenhuma promoção publicada ainda.</p>
@else
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marketplace</th>
                <th>Produto ID</th>
                <th>Título</th>
                <th>Publicado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->id }}</td>
                    <td>{{ $oferta->marketplace }}</td>
                    <td>{{ $oferta->produto_id }}</td>
                    <td>{{ $oferta->titulo ?? '-' }}</td>
                    <td>{{ $oferta->created_at?->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
