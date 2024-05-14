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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- jQuery -->
</head>
<body>
    <div class="container">
        <div class="form-container register-form">
            <h2>Registro</h2>
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" id="name" name="name" placeholder="Nombre" required autofocus>
                <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Registrarse</button>
                <div>
                    <a href="/login">ya tengo cuenta</a>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#registerForm').submit(function(event) {
                // Prevenir el envío del formulario por defecto
                event.preventDefault();

                // Obtener el valor del campo de nombre y contraseña y eliminar espacios iniciales y finales
                var name = $('#name').val().trim();
                var password = $('#password').val().trim();

                // Validar que el campo de nombre y contraseña no contengan espacios en medio de las palabras
                if (/\s/g.test(name) || /\s/g.test(password)) {
                    alert('El nombre y la contraseña no pueden contener espacios en medio de las palabras.');
                    return;
                }

                // Obtener el valor del campo de correo electrónico
                var email = $('#email').val().trim();

                // Validar los campos restantes
                if (name === '' || email === '' || password === '') {
                    alert('Por favor, complete todos los campos.');
                    return;
                }

                // Enviar el formulario si todos los campos están completos
                $('#registerForm')[0].submit();
            });
        });
    </script>

</body>
</html>


