<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/styles.css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <div class="col-16">
            @yield('content')
        </div>
    </div>
    <footer>
        <p>Tarique Vieira Ramos</p>
    </footer>
</body>

</html>
