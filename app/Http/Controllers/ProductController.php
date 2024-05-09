<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public function index(){
        try {
            // Obtener el token de la sesión del usuario
            $token = Session::get('auth_token');

            // Realizar la solicitud GET a la API de productos incluyendo el token en los encabezados
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get(env('API_BASE_URL'));

            if ($response->successful()) {
                // Decodificar los datos JSON de la respuesta
                $products = $response->json();
                return view('productos', ['products' => $products]);
            } else {
                return response()->json(['message' => 'Error al obtener los productos'], $response->status());
            }
        } catch (\Exception $e) {
            // Manejar errores de la solicitud
            return response()->json(['message' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
        }
    }
    public function store(Request $request){
    try {
        // Obtener el token de la sesión del usuario
        $token = Session::get('auth_token');
        //Verificar
        $requestData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Realizar la solicitud POST a la API de productos incluyendo el token en los encabezados y los datos del nuevo producto
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(env('API_BASE_URL'), $requestData);

        if ($response->successful()) {
            return redirect('/productos');
        } else {
            // Devolver el mensaje de error de la respuesta de la API
            return response()->json($response->json(), $response->status());
        }
    } catch (\Exception $e) {
        // Manejar errores de la solicitud
        return response()->json(['message' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
    }
}
public function destroy($id){
    try {
        // Obtener el token de la sesión del usuario
        $token = Session::get('auth_token');

        // Realizar la solicitud DELETE a la API para eliminar el producto incluyendo el token en los encabezados
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete("http://localhost:8000/api/products/$id");

        if ($response->successful()) {
            return redirect('/productos');
        } else {
            // Manejar errores de la API
            return response()->json(['message' => 'Error al eliminar el producto API'], $response->status());
        }
    } catch (\Exception $e) {
        // Manejar errores de la solicitud
        return response()->json(['message' => 'Error al eliminar el producto: ' . $e->getMessage()], 500);
    }
}
public function update(Request $request, $id){
    try {
        // Obtener el token de la sesión del usuario
        $token = Session::get('auth_token');

        // Obtener los datos del formulario
        $requestData = $request->all();

        // Realizar la solicitud PUT a la API para actualizar el producto incluyendo el token en los encabezados
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->put("http://localhost:8000/api/products/$id", $requestData);

        if ($response->successful()) {
            // Devolver una respuesta adecuada
            return redirect('/productos')->with('success', 'El producto ha sido actualizado correctamente.');
        } else {
            // Manejar errores de la API
            return response()->json(['message' => 'Error al actualizar el producto API'], $response->status());
        }
    } catch (\Exception $e) {
        // Manejar errores de la solicitud
        return response()->json(['message' => 'Error al actualizar el producto: ' . $e->getMessage()], 500);
    }
}
public function edit($id)
{
    try {
        // Obtener el token de la sesión del usuario
        $token = Session::get('auth_token');

        // Obtener el producto por su ID desde la API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("http://localhost:8000/api/products/$id");

        if ($response->successful()) {
            // Decodificar los datos JSON de la respuesta
            $product = $response->json();
            return view('editar_producto', compact('product'));
        } else {
            // Manejar errores de la API
            return redirect()->route('productos.index')->with('error', 'Error al cargar el producto para editar.');
        }
    } catch (\Exception $e) {
        // Manejar errores
        return redirect()->route('productos.index')->with('error', 'Error al cargar el producto para editar: ' . $e->getMessage());
    }
}

}
