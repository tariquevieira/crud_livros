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

            @if (!empty($status) && !empty($mensagem))
                <div
                    class="alert @if ($status) {{ 'success' }} @else {{ 'error' }} @endif">
                    {{ $mensagem }}</div>
            @endif
            @if ($errors->any())
                <h4>{{ $errors->first() }}</h4>
            @endif

            <h1>Novo livro</h1>
            <form action="{{ route('livro.store') }}" method="post">
                @csrf
                <div class="column-row">
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" id="titulo" value="">

                    <label for="editora">Editora:</label>
                    <input type="text" name="editora" id="editora" value="">

                    <label for="edicao">Edição:</label>
                    <input type="number" name="edicao" id="edicao" value="">

                    <label for="editora">Ano de Publicação:</label>
                    <input type="text" name="anoPub" id="anoPub" value="">
                </div>

                <fieldset>
                    <legend>Autores</legend>
                    <div class="scroll">
                        @forelse ($autores as $autor)
                            <label for="autor">{{ $autor->nome }}: </label>
                            <input type="checkbox" name="autores[]" value="{{ $autor->codAu }}">
                        @empty
                            <p>Nenhum autor encontrado</p>
                        @endforelse
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Assunto</legend>
                    <div class="scroll">
                        @forelse ($assuntos as $assunto)
                            <label for="assunto">{{ $assunto->descricao }}: </label>
                            <input type="checkbox" name="assuntos[]" value="{{ $assunto->codAs }}">
                        @empty
                            <p>Nenhum autor encontrado</p>
                        @endforelse
                    </div>
                </fieldset>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>

</html>
