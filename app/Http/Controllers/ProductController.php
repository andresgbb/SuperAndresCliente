<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        try {
            // Obtener el token de la sesión del usuario
            $token = Session::get('auth_token');

            // Realizar la solicitud GET a la API de productos incluyendo el token en los encabezados
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get('http://localhost:8000/api/products');

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
}
