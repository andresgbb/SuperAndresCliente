<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Valida las credenciales del usuario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Realiza una solicitud POST a la ruta de login de tu API
            $response = Http::post('http://localhost:8000/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Obtiene la respuesta de la API
            $data = $response->json();

            // Devuelve la respuesta al cliente
            return response()->json($data, $response->status());
        } catch (\Exception $e) {
            // Maneja errores
            return response()->json(['message' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
        }
    }
}

