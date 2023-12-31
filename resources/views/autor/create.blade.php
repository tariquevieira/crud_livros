@extends('layouts.main')
@section('title', 'Novo Autor')
@section('content')
    @if (!empty($created) && !empty($mensagem))
        <div class="alert @if ($updated) {{ 'success' }} @else {{ 'error' }} @endif">
            {{ $mensagem }}</div>
    @endif
    <div class="mt-2 p-4">
        <h1>Novo Autor</h1>
    </div>

    <form action="{{ route('autor.store') }}" method="post" class="form">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="nome" class="col-form-label">Nome:</label>
            </div>
            <div class="col-auto">
                <input type="text" name="nome" id="nome" value="" class="form-control">
            </div>
            <div class="col-auto">
                <input type="submit" value="Enviar" class="btn btn-secondary">
            </div>
    </form>
@endsection
