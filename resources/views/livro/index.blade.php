@extends('layouts.main')
@section('title', 'Lista de livros')
@section('content')
    @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
    @endif
    <div class="d-flex flex-row p-2 justify-content-between">
        <h1>Lista de livros</h1>
        <a href="{{ route('livro.create') }}" class="btn btn-success mt-2 mb-2" hole="button">Novo</a>
    </div>

    <ul class="list-group">
        @forelse ($livros as $livro)
            <li class="list-group-item d-flex flex-row justify-content-between">
                <span class="m-2">{{ $livro->titulo }}</span>
                <div class="d-flex flex-row">
                    <a href="{{ route('livro.edit', $livro->codl) }}" class="btn btn-secondary me-2" hole="button">Editar</a>
                    <form action="{{ route('livro.destroy', $livro->codl) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Excluir" class="btn btn-danger">
                    </form>

                </div>

            </li>
        @empty
            <p>Não existe livro</p>
        @endforelse
    </ul>
@endsection
