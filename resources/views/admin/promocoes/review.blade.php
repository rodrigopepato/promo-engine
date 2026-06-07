<h1>Revisar Promoção</h1>

<p>Confira os dados antes de publicar no Telegram.</p>

<ul>
    <li><strong>Marketplace:</strong> {{ $dados['marketplace'] }}</li>
    <li><strong>Título:</strong> {{ $dados['titulo'] }}</li>
    <li><strong>URL:</strong> {{ $dados['produto_url'] }}</li>
    <li><strong>Preço original:</strong> {{ $dados['preco_original'] ?? '-' }}</li>
    <li><strong>Preço promocional:</strong> {{ $dados['preco_promocao'] }}</li>
    <li><strong>Possui cupom:</strong> {{ $temCupom ? 'Sim' : 'Não' }}</li>
    <li><strong>Cupom:</strong> {{ $dados['cupom_codigo'] ?? '-' }}</li>
</ul>

<form method="POST" action="{{ route('admin.promocoes.store') }}">
    @csrf

    @foreach ($dados as $campo => $valor)
        <input type="hidden" name="{{ $campo }}" value="{{ $valor }}">
    @endforeach

    @if ($temCupom)
        <input type="hidden" name="tem_cupom" value="1">
    @endif

    <button type="submit">Confirmar e publicar no Telegram</button>
</form>

<br>

<a href="{{ route('admin.promocoes.create') }}">
    Cancelar
</a>
