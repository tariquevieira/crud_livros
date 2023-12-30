<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="center">
        <div class="w100">
            @if(!empty($status) && !empty($message))
                <div class="alert @if($status) {{"success"}} @else {{ "error" }} @endif">{{$mensagem}}</div>
            @endif
            <h1>Editar Autor</h1>
            <form action="{{ route('autor.update', $autor->codAu )}}" method="post">
                @csrf
                @method('PUT')
                <label for="codAu">Codigo Autor</label>
                <input type="number" value="{{ $autor->codAu }}">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{ $autor->nome }}">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>
