@extends('layouts.main')
@section('title', 'Editar Assunto')
@section('content')
   
    <div class="mt-2 p-4">
        <h1>Editar Assunto</h1>
    </div>
    <form action="{{ route('assunto.update', $assunto->codAs) }}" method="post" class="form">
        @csrf
        @method('PUT')

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="codAs" class="col-form-label">Código Assunto:</label>
            </div>
            <div class="col-auto">
                <input type="number" class="form-control" value="{{ $assunto->codAs }}" disabled>
            </div>
            <div class="col-auto">
                <label for="descricao" class="col-form-label">Descricao:</label>
            </div>

            <div class="col-auto">
                <input type="text" name="descricao" class="form-control" id="descricao"
                    value="{{ $assunto->descricao }}">
            </div>
            <div class="col-auto">
                <input type="submit" value="Enviar" class="btn btn-secondary">
            </div>
        </div>
    </form>
@endsection
