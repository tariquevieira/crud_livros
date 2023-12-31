@extends('layouts.main')
@section('title', 'Editar Autor')
@section('content')
    @if (!empty($status) && !empty($message))
        <div class="alert @if ($status) {{ 'success' }} @else {{ 'error' }} @endif">
            {{ $mensagem }}</div>
    @endif
    <h1>Editar Autor</h1>
    <form action="{{ route('autor.update', $autor->codAu) }}" method="post">
        @csrf
        @method('PUT')

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="codAu" class="col-form-label">Codigo Autor</label>
            </div>

            <div class="col-auto">
                <input type="number" value="{{ $autor->codAu }}" class="col-form-label">
            </div>

            <div class="col-auto">
                <label for="nome" class="col-form-label">Nome:</label>
            </div>

            <div class="col-auto">
                <input type="text" name="nome" id="nome" value="{{ $autor->nome }}" class="col-form-label">
            </div>

            <div class="col-auto">
                <input type="submit" value="Enviar" class="btn btn-secondary">
            </div>

        </div>
    </form>
@endsection
