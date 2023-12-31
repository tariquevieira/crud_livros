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
        <div class="form-group">
            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="titulo">Titulo:</label>
                </div>
                <div class="col-11">
                   <input class="form-control" type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="editora">Editora:</label>
                </div>
                <div class="col-11">
                   <input class="form-control" type="text" name="editora" id="editora" value="{{ $livro->editora }}">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="edicao">Edição:</label>
                </div>
                <div class="col-11">
                   <input class="form-control" type="number" name="edicao" id="edicao" value="{{ $livro->edicao }}">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="editora">Ano de Publicação:</label>
                </div>
                <div class="col-11">
                   <input class="form-control" type="text" name="anoPub" id="anoPub" value="{{ $livro->anoPublicacao }}">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">

                <fieldset>
                    <legend>Autores</legend>
                    <div class="scroll-container">
                        <ul class="list-group list-group-flush">
                            @forelse ($autores as $autor)
                                <li class="list-group-item">
                                    <input type="checkbox" name="autores[]" value="{{ $autor['codAu'] }}"
                                    @if ((bool) $autor['checked']) checked @endif>
                                    <label class="col-form-label ms-1" for="autor">{{ $autor['nome'] }} </label>
                                </li>
                            @empty
                                <p>Nenhum autor encontrado</p>
                            @endforelse
                        </ul>
                    </div>
                </fieldset>
            </div>
            <fieldset>
                <legend>Assunto</legend>
                <div class="scroll-container">
                    <ul class="list-group list-group-flush">
                        @forelse ($assuntos as $assunto)
                            <li class="list-group-item">
                                <input type="checkbox" name="assuntos[]" value="{{ $assunto['codAs'] }}"
                        @if ((bool) $assunto['checked']) checked @endif>
                                <label class="col-form-label ms-1" for="assunto">{{ $assunto['descricao'] }} </label>
                            </li>
                        @empty
                            <p>Nenhum autor encontrado</p>
                        @endforelse
                    </ul>
                </div>
            </fieldset>
            <input class="btn btn-secondary" type="submit" value="Enviar">
        </div>
    </form>
@endsection
