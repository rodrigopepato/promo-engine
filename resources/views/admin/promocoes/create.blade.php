<h1>Nova Promoção</h1>

@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('admin.dashboard') }}">
    Voltar para o dashboard
</a>

<br>
<a href="{{ route('admin.promocoes.index') }}">
    Ver promoções publicadas
</a>

@if ($errors->any())
    <div>
        <strong>Corrija os erros abaixo:</strong>

        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.promocoes.store') }}">
    @csrf

    <div>
        <label>Marketplace</label>
        <select name="marketplace" required>
            <option value="">Selecione</option>
            <option value="amazon" @selected(old('marketplace') === 'amazon')>Amazon</option>
            <option value="mercadolivre" @selected(old('marketplace') === 'mercadolivre')>Mercado Livre</option>
        </select>
    </div>

    <div>
        <label>Título</label>
        <input type="text" name="titulo" value="{{ old('titulo') }}" required>
    </div>

    <div>
        <label>URL do produto / link de afiliado</label>
        <input type="url" name="produto_url" value="{{ old('produto_url') }}" required>

        <small>
            Cole aqui preferencialmente o seu link de afiliado.
        </small>
    </div>

    <div>
        <label>Preço original</label>
        <input type="number" step="0.01" name="preco_original" value="{{ old('preco_original') }}">
    </div>

    <div>
        <label>Preço promocional</label>
        <input type="number" step="0.01" name="preco_promocao" value="{{ old('preco_promocao') }}" required>
    </div>

    <div>
        <label>
            <input type="checkbox" name="tem_cupom" value="1" @checked(old('tem_cupom'))>
            Possui cupom?
        </label>
    </div>

    <div>
        <label>Código do cupom</label>
        <input type="text" name="cupom_codigo" value="{{ old('cupom_codigo') }}">
    </div>

    <button type="submit">Publicar promoção</button>
</form>
