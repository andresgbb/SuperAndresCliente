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

           <div class="nav-container">
                <div class="title">
                    <h1>SuperAndres</h1>
                </div>
                <div class="navegacion">
                    <div class="enlaces">
                        <a href="/home">Home</a>
                        <a href="/proveedores"> Proveedores</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="logout">
                            <button type="submit">Logout</button>
                        </div>
                    </form>
                </div>
           </div>
           <div class="container mx-auto">
            <div class="cont">
                <div class="lista">
                    <h2>Lista de Productos</h2>
                </div>
                <div class="crear">
                    <a href="/crearproducto">Crear</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products['data'] as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>
                            <div class="acciones-container">
                                <a href="{{ route('productos.edit', $product['id']) }}" class="btn-modificar">Modificar</a>
                                <form id="deleteForm" action="{{ route('productos.destroy', $product['id']) }}" method="POST">
                                    @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn-eliminar">Eliminar</button>
                                 </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </body>
</html>
