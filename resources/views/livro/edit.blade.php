@extends('layouts.main')
@section('title', 'Editar Livro')
@section('content')

    <h1>Editar livro</h1>
    <form action="{{ route('livro.update', $livro->codl) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">

            @include('livro.includes.dadosform')
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
            <div class="row g-3 align-items-center mb-2">
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
            </div>
            <input class="btn btn-secondary" type="submit" value="Enviar">
        </div>
    </form>
@endsection
