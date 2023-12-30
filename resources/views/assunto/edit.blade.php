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
            <h1>Editar assunto</h1>
            <form action="{{ route('assunto.update', $assunto->codAs )}}" method="post">
                @csrf
                @method('PUT')
                <label for="codAs">Codigo assunto</label>
                <input type="number" value="{{ $assunto->codAs }}">
                <label for="descricao">descricao:</label>
                <input type="text" name="descricao" id="descricao" value="{{ $assunto->descricao }}">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>
