<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Editar Proveedor</title>
</head>
<body>
    <div class="provider-edit-form-container">
        <h1>Editar Proveedor</h1>
        <form action="{{ route('providers.update', $provider['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ $provider['name'] }}"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $provider['email'] }}"><br>

            <label for="phone">Teléfono:</label>
            <input type="text" id="phone" name="phone" value="{{ $provider['phone'] }}"><br>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>

</body>
</html>

