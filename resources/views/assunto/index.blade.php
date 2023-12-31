@extends('layouts.main')
@section('title', 'Lista de Assuntos')
@section('content')
    <div class="d-flex flex-row p-2 justify-content-between">
        <h1>Lista de Assuntos</h1>
        <a href="{{ route('assunto.create') }}" class="btn btn-success mt-2 mb-2" hole="button">Novo</a>
    </div>
    <ul class="list-group">
        @forelse ($assuntos as $assunto)
            <li class="list-group-item d-flex flex-row justify-content-between">
                <span class="m-2">{{ $assunto->descricao }}</span>

                <div class="d-flex flex-row">
                    <a href="{{ route('assunto.edit', $assunto->codAs) }}" class="btn btn-secondary me-2"
                        hole="button">Editar</a>
                    <form action="{{ route('assunto.destroy', $assunto->codAs) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Excluir" class="btn btn-danger" onclick="return confirm('Deseja Apagar esse assunto?')">
                    </form>
                </div>

            </li>
        @empty
            <p>Não existe assuntoes</p>
        @endforelse
    </ul>
@endsection
