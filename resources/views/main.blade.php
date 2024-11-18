<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/main.css">
    @yield('styles')

</head>
<body>
    <header class="custom-header">
        <p class="title">Controle de Viagens</p>
        <div class='cadastro'>
            <p class="section-title">Cadastrar</p>
            <nav>
                <a href="{{route('store.motorista')}}">Motorista</a>
                <a href="{{route('store.veiculos')}}">Veiculos</a>
                <a href="{{route('cadastros.viagens')}}">Viagens</a>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="custom-footer">
        Maykoll Rocha &copy; 2024
    </footer>
    @yield('scripts')
</body>
</html>
