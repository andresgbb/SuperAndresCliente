<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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

            // Verifica si la solicitud fue exitosa
            if ($response->successful()) {
                // Guarda el token en la sesión del usuario
                Session::put('auth_token', $data['token']);
                // Redirecciona al usuario a la página de inicio
                return redirect('/home');
            }

            // Devuelve la respuesta al cliente
            return response()->json($data, $response->status());
        } catch (\Exception $e) {
            // Maneja errores
            return response()->json(['message' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
        }
    }
}


