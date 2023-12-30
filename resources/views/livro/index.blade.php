<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="center">
        <div class="w100">
            @if ($errors->any())
                <h4>{{ $errors->first() }}</h4>
            @endif
            <h1>Lista de livros</h1>
            <a href="{{route('livro.create')}}">Novo</a>
            <ul>
                @forelse ($livros as $livro)
                    <li>
                        {{ $livro->titulo }}
                        <a href="{{ route('livro.edit', $livro->codl)}}">Editar</a>
                        <form action="{{route('livro.destroy', $livro->codl)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir">
                        </form>
                    </li>
                @empty
                    <p>Não existe livro</p>
                @endforelse
            </ul>
        </div>
    </div>

</body>

</html>
