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
            @if(!empty($status) && !empty($mensagem))
                <div class="alert @if($status) {{"success"}} @else {{ "error" }} @endif">{{$mensagem}}</div>
            @endif
            <h1>Novo Assunto</h1>
            <form action="{{ route('assunto.store')}}" method="post">
                @csrf
                <label for="descricao">descricao:</label>
                <input type="text" name="descricao" id="descricao" value="">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>
