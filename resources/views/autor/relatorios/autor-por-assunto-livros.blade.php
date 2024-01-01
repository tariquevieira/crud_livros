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
        .center {
            margin-top: 0 auto;
        }

        th,
        td {
            border-collapse: collapse;
            /*define a separação entre as bordar*/
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #8C2034;
            color: white;
        }

    </style>
    <title>Autores por assunto e quantida livros</title>
</head>

<body>
    <h1>Autores por assunto e quantida livros</h1>
     <div class="center">
        <table>
            <thead>
                <th>Autor</th>
                <th>Assunto</th>
                <th>Quantidade de Livros</th>
            </thead>
            <tbody>
                @forelse ($result as $autor)
                    <tr>
                        <td>{{ $autor->nome }}</td>
                        <td>{{ $autor->descricao }}</td>
                        <td>{{ $autor->quantidade_livros }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
     </div>


</body>

</html>
