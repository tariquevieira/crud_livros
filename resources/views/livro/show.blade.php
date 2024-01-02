@extends('layouts.main')
@section('title', 'Mostrar Livro')
@section('content')
    <h1>Livro: {{ $livro->titulo }}</h1>
    <form>
        <div class="form-group">
            @include('livro.includes.dadosform')
        </div>
        <div class="row">
            <h3 class="mb-4">Autores</h3>
            <div class="scroll-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($livro->autores as $autor)
                            <tr>
                                <td>
                                    {{ $autor->codAu }}
                                </td>
                                <td>
                                    {{ $autor->nome }}
                                </td>
                            </tr>
                        @empty
                            <p>Nenhum autor encontrado</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <h3 class="mb-4">Assunto</h3>
            <div class="scroll-container">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($livro->assuntos as $assunto)
                            <tr>
                                <td>
                                    {{ $assunto->codAs }}
                                </td>
                                <td>
                                    {{ $assunto->descricao }}
                                </td>
                            </tr>
                        @empty
                            <p>Nenhum assunto encontrado</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
