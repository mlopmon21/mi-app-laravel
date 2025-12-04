<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel')</title>
    {{-- CSS propio --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>

    <div class="sidebar">
        @section('sidebar')
            <h2>Menú lateral</h2>
            <ul>
                <li><a href="/hola">Inicio</a></li>
                <li><a href="/articles">Artículos</a></li>
            </ul>

            @auth
                <p>
                    Has iniciado sesión como
                    <strong>{{ auth()->user()->username ?? auth()->user()->email }}</strong>
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @endauth

            @guest
                <p>
                    <a href="{{ route('login') }}">Iniciar sesión</a> |
                    <a href="{{ route('register') }}">Registrarse</a>
                </p>
            @endguest
        @show
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
