@php
    if (!empty($result)) {
        $viewModel = new \App\ViewModel\Autor\ViewModel\AutorPorAussuntoLivrosViewModel();
        $result = $viewModel->agrupaArrayPorAutor($result);
    }
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-bottom: 50px;
        }

        th {
            background-color: #8C2034;
            color: white;
        }

        td {
            padding: 25px 10px;
            background-color: #F2F2F2;
        }
    </style>
    <title>Autores por assunto e quantia de livros</title>
</head>

<body>
    <h1>Autores por Assunto e quantia de Livros</h1>

        @forelse ($result as $key => $autor)
            <table id="{{ $key }}">
                <tr>
                    <th style="width: 100%" colspan="5" >Autor</th>
                </tr>
                <tr>
                    <td colspan="5"><strong>{{ $key }}<strong></td>
                </tr>
                <tr>
                    <th>Assunto</th>
                    <th colspan="4">Quantidade de Livros</th>
                </tr>
                @forelse ($autor as $dados)
                    <tr>
                        <td>{{ $dados->descricao }}</td>
                        <td colspan="4">{{ $dados->quantidade_livros }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2"> Não há dados</td>
                    </tr>
                @endforelse
            </table>
        @empty
            <p> Não há Registros</p>
        @endforelse

</body>

</html>
