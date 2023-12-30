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
            <h1>Lista de assuntoes</h1>
            <a href="{{route('assunto.create')}}">Novo</a>
            <ul>
                @forelse ($assuntos as $assunto)
                    <li>
                        {{ $assunto->descricao }}
                        <a href="{{ route('assunto.edit', $assunto->codAs)}}">Editar</a>
                        <form action="{{route('assunto.destroy', $assunto->codAs)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir">
                        </form>
                    </li>
                @empty
                    <p>Não existe assuntoes</p>
                @endforelse
            </ul>
        </div>
    </div>

</body>

</html>
