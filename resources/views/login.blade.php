<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/loginregister.css') }}"> <!-- Enlace al archivo CSS de estilos -->
</head>
<body>
    <div class="container">
        <div class="form-container login-form">
            <h2>Iniciar Sesión</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                    <input type="email" name="email" placeholder="Correo electrónico">
                    <input type="password" name="password" placeholder="Contraseña">
                <button type="submit">Iniciar Sesión</button>
                <div class="centrar">
                    <a href="{{ route('register') }}">Crear cuenta</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

