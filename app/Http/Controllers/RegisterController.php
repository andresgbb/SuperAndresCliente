<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
{
    // Valida los datos del formulario de registro
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    try {
        // Realiza una solicitud POST a la ruta de registro de tu API
        $response = Http::post(env('API_BASE_URL').'/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();

        if ($response->successful()) {
            return redirect('login');
        }

        // Devuelve la respuesta al cliente en caso de error
        return response()->json($data, $response->status());
    } catch (\Exception $e) {
        // Maneja errores
        return response()->json(['message' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
    }
}
}

