@extends('layouts.main')
@section('title', 'Mostrar Livro')
@section('content')
    <h1>Livro: {{ $livro->titulo }}</h1>
    <form>
        <div class="column-row">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}" disabled>

            <label for="editora">Editora:</label>
            <input type="text" name="editora" id="editora" value="{{ $livro->editora }}" disabled>

            <label for="edicao">Edição:</label>
            <input type="number" name="edicao" id="edicao" value="{{ $livro->edicao }}" disabled>

            <label for="editora">Ano de Publicação:</label>
            <input type="text" name="anoPub" id="anoPub" value="{{ $livro->anoPublicacao }}" disabled>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                    </tr>
                </thead>
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
            </table>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                    </tr>
                </thead>
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
            </table>
        </div>
    </form>
@endsection
