@extends('layouts.main')
@section('title', 'Lista de Autores')
@section('content')
    <div class="d-flex flex-row p-2 justify-content-between">
        <h1>Lista de Autores</h1>
        <a href="{{ route('autor.create') }}" class="btn btn-success mt-2 mb-2" hole="button">Novo</a>
    </div>

    <ul class="list-group">
        @forelse ($autores as $autor)
            <li class="list-group-item d-flex flex-row justify-content-between">
                <span class="m-2">{{ $autor->nome }}</span>

                <div class="d-flex flex-row">
                    <a href="{{ route('autor.edit', $autor->codAu) }}"  class="btn btn-secondary me-2" hole="button">Editar</a>
                    <form action="{{ route('autor.destroy', $autor->codAu) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Excluir" class="btn btn-danger">
                    </form>
                </div>
            </li>
        @empty
            <p>Não existe autores</p>
        @endforelse
    </ul>
@endsection
