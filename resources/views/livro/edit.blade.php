@extends('layouts.main')
@section('title', 'Editar Livro')
@section('content')

    @if (!empty($status) && !empty($mensagem))
        <div class="alert @if ($status) {{ 'success' }} @else {{ 'error' }} @endif">
            {{ $mensagem }}</div>
    @endif
    @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
    @endif

    <h1>Editar livro</h1>
    <form action="{{ route('livro.update', $livro->codl) }}" method="post">
        @csrf
        @method('PUT')
        <div class="column-row">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}">

            <label for="editora">Editora:</label>
            <input type="text" name="editora" id="editora" value="{{ $livro->editora }}">

            <label for="edicao">Edição:</label>
            <input type="number" name="edicao" id="edicao" value="{{ $livro->edicao }}">

            <label for="editora">Ano de Publicação:</label>
            <input type="text" name="anoPub" id="anoPub" value="{{ $livro->anoPublicacao }}">
        </div>

        <fieldset>
            <legend>Autores</legend>
            <div class="scroll">
                @forelse ($autores as $autor)
                    <input type="checkbox" name="autores[]" value="{{ $autor['codAu'] }}"
                        @if ((bool) $autor['checked']) checked @endif>
                    <label for="autor">{{ $autor['nome'] }}: </label>
                @empty
                    <p>Nenhum autor encontrado</p>
                @endforelse
            </div>
        </fieldset>

        <fieldset>
            <legend>Assunto</legend>
            <div class="scroll">
                @forelse ($assuntos as $assunto)
                    <input type="checkbox" name="assuntos[]" value="{{ $assunto['codAs'] }}"
                        @if ((bool) $assunto['checked']) checked @endif>
                    <label for="assunto">{{ $assunto['descricao'] }}: </label>
                @empty
                    <p>Nenhum autor encontrado</p>
                @endforelse
            </div>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
@endsection
