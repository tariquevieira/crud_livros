@extends('layouts.main')
@section('title', 'Novo Assunto')
@section('content')
   
    <div class="mt-2 p-4">
        <h1>Novo Assunto</h1>
    </div>
    <form action="{{ route('assunto.store') }}" method="post" class="form">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="descricao" class="col-form-label">Descricao:</label>
            </div>
            <div class="col-auto">
                <input type="text" name="descricao" id="descricao" value="" class="form-control">
            </div>
            <div class="col-auto">
                <input type="submit" value="Enviar" class="btn btn-secondary">
            </div>
        </div>
    </form>
@endsection
