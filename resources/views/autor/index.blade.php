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
            <h1>Lista de Autores</h1>
            <a href="{{route('autor.create')}}">Novo</a>
            <ul>
                @forelse ($autores as $autor)
                    <li>
                        {{ $autor->nome }}
                        <a href="{{ route('autor.edit', $autor->codAu)}}">Editar</a>
                        <form action="{{route('autor.destroy', $autor->codAu)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir">
                        </form>
                    </li>
                @empty
                    <p>Não existe autores</p>
                @endforelse
            </ul>
        </div>
    </div>

</body>

</html>
