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
    <nav class="navbar navbar-expand-lg p-4">
        <div class="container-fluid">
            <a class="navbar-brand text-color__secondary" href="{{ route('livro.index')}}"><strong>Cadastro de Livros</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  text-color__secondary" aria-current="page" href="{{ route('livro.index')}}">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color__secondary" href="{{ route('autor.index')}}">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color__secondary" href="{{ route('assunto.index')}}">Assunto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main">
        <div class="row">
            <div class="col-16 p-4">
                @if (!empty($status) && !empty($mensagem))
                <div class="alert alert-@if ($status) {{ 'success' }} @else {{ 'error' }} @endif"
                    hole="alert">
                    {{ $mensagem }}</div>
            @endif
        
            @if ($errors->any())
                <div class="alert alert-danger" hole="alert">
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif
            
                @yield('content')
            </div>
        </div>

    </div>

    <footer class="footer">
        <ul class="nav justify-content-center pb-3 mb-3">
          <li class="nav-item"><a href="https://www.tjrj.jus.br/" class="nav-link px-2  text-color__secondary">Tribunal de Justiça do Estado do Rio de Janeiro</a></li>
          <li class="nav-item"><a href="https://www.spassu.com.br/" class="nav-link px-2 text-color__secondary">Spassu</a></li>
        </ul>
        <p class="text-center text-color__secondary">© 2024 Tarique Vieira Ramos</p>
      </footer>

</body>

</html>
