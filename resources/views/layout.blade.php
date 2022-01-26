<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url(mix('site/css/style.css'))}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 justify-content-between">
        <a class="navbar navbar-expand-lg" style="text-decoration:none;" href="{{ route('listar_series') }}">Home</a>
        @auth
            <a href="/sair" class="btn btn-danger btn-sm" >Sair</a>
        @endauth

        @guest
            <a href="/entrar" class="btn btn-primary btn-sm" >Entrar</a>
        @endguest
            
   </nav>
    <div class="container">
        <div class="jumbotron mt-2 text-center">
            <h1>@yield('cabecalho')</h1>
        </div>

        @yield('conteudo')
    </div>
</body>
</html>
<script src="{{url(mix('site/js/script.js'))}}"></script>
