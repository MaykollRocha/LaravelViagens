<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/mainCadastro.css">
    @yield('styless')
</head>
<body>
    <header class="custom-header">
        <div class="header-content">
            <p class="title">Informações sobre @yield('typecad')</p>
            <nav class="header-nav">
                <a href="/" class="nav-link home-link">HOME</a>
            </nav>
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer class="custom-footer">
        Maykoll Rocha &copy; 2024
    </footer>
</body>
</html>
