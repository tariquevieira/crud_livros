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
            @if(!empty($created) && !empty($mensagem))
                <div class="alert @if($updated) {{"success"}} @else {{ "error" }} @endif">{{$mensagem}}</div>
            @endif
            <h1>Novo Autor</h1>
            <form action="{{ route('autor.store')}}" method="post">
                @csrf
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>
