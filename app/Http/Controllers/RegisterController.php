<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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
        // Verifica si el correo electrónico ya está en la base de datos
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // Si el usuario ya existe, redirige al usuario de vuelta al formulario de registro con un mensaje de error
            return redirect('register')->withErrors(['email' => 'El correo electrónico ya está registrado.'])->withInput();
        }


        // Si el correo electrónico no está registrado, realiza una solicitud POST a la ruta de registro de tu API
        $response = Http::post(env('API_BASE_URL').'/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            return redirect('login');
        }

        // Devuelve la respuesta al cliente en caso de error
        return redirect('register');
    } catch (\Exception $e) {
        // Maneja errores
        return response()->json(['message' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
    }
}
}

