<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>
</head>
<body>

    <div class="sidebar">
        @section('sidebar')
            <h2>Menú lateral</h2>
            <ul>
                <li><a href="/hola">Inicio</a></li>
                <li><a href="/articles">Artículos</a></li>
            </ul>
        @show
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
