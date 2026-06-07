<h1>Promoções Publicadas</h1>

<a href="{{ route('admin.dashboard') }}">
    Dashboard
</a>

|

<a href="{{ route('admin.promocoes.create') }}">
    Nova Promoção
</a>

<br><br>

@if ($ofertas->isEmpty())
    <p>Nenhuma promoção publicada.</p>
@else

<table border="1" cellpadding="8" cellspacing="0">

    <thead>
        <tr>
            <th>Título</th>
            <th>Marketplace</th>
            <th>Preço</th>
            <th>Cupom</th>
            <th>Data</th>
        </tr>
    </thead>

    <tbody>

    @foreach ($ofertas as $oferta)

        <tr>

            <td>
                <strong>{{ $oferta->titulo }}</strong>
                <br>
                <small>
                    <a href="{{ $oferta->produto_url }}" target="_blank">
                        Abrir produto
                    </a>
                </small>
            </td>

            <td>
                {{ ucfirst($oferta->marketplace) }}
            </td>

            <td>

                @if($oferta->preco_original)
                    <small>
                        De R$ {{ number_format($oferta->preco_original, 2, ',', '.') }}
                    </small>

                    <br>
                @endif

                <strong>
                    R$ {{ number_format($oferta->preco_atual, 2, ',', '.') }}
                </strong>

            </td>

            <td>

                @if($oferta->tem_cupom)

                    @if($oferta->cupom_codigo)
                        {{ $oferta->cupom_codigo }}
                    @else
                        Disponível
                    @endif

                @else

                    -

                @endif

            </td>

            <td>
                {{ \Carbon\Carbon::parse($oferta->publicado_em)->format('d/m/Y H:i') }}
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endif
