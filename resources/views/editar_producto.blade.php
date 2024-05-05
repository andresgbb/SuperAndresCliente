<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $product['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $product['name'] }}"><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description">{{ $product['description'] }}</textarea><br>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" value="{{ $product['price'] }}"><br>

        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
