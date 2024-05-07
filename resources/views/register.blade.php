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
        <div class="form-container register-form">
            <h2>Registro</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="Nombre" required autofocus>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>

