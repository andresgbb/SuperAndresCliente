<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="form-container">
                <h1>Crear Producto</h1>
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="description">Descripción:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div>
                        <label for="price">Precio:</label>
                        <input type="number" id="price" name="price" required step="0.01">

                    </div>
                    <button type="submit">Guardar</button>
                </form>
            </div>


            </div>
        </div>
    </body>
</html>
