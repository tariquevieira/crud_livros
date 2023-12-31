@extends('layouts.main')
@section('title', 'Novo Livro')
@section('content')

    <h1>Novo livro</h1>
    <form action="{{ route('livro.store') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="titulo">Titulo:</label>
                </div>
                <div class="col-11">
                    <input class="form-control" type="text" name="titulo" id="titulo" value="">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="editora">Editora:</label>
                </div>
                <div class="col-11">
                    <input class="form-control" type="text" name="editora" id="editora" value="">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="edicao">Edição:</label>
                </div>
                <div class="col-11">
                    <input class="form-control" type="number" name="edicao" id="edicao" value="">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">
                <div class="col-1">
                    <label class="col-form-label" for="editora">Ano de Publicação:</label>
                </div>
                <div class="col-11">
                    <input class="form-control" type="text" name="anoPub" id="anoPub" value="">
                </div>
            </div>

            <div class="row g-3 align-items-center mb-2">

                <fieldset>
                    <legend>Autores</legend>
                    <div class="scroll-container">
                        <ul class="list-group list-group-flush">
                            @forelse ($autores as $autor)
                                <li class="list-group-item">
                                    <input type="checkbox" name="autores[]" value="{{ $autor->codAu }}">
                                    <label class="col-form-label ms-1" for="autor">{{ $autor->nome }} </label>
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
                                <input type="checkbox" name="assuntos[]" value="{{ $assunto->codAs }}">
                                <label class="col-form-label ms-1" for="assunto">{{ $assunto->descricao }} </label>
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
