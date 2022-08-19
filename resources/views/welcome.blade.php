<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <a href="/contact">Contato</a>
        <a href="/products">Produtos</a>

        @for($i = 0; $i < count($nomes); $i++) 
            <p>{{ $nomes[$i] }}</p>
        @endfor

        @foreach($idades as $idade)
            <h1>$idade</h1>
            <h2>{{ $loop->index }}</h2>
        @endforeach

        @php 
            $nome_completo = 'Maicon Vieira de Oliveira';
            echo $nome_completo;
        @endphp 
    </body>
</html>
