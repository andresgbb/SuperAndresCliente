<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(){
        try {
            // Obtener el token de la sesión del usuario
            $token = Session::get('auth_token');

            // Realizar la solicitud GET a la API de productos incluyendo el token en los encabezados
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get('http://localhost:8000/api/providers');

            if ($response->successful()) {
                // Decodificar los datos JSON de la respuesta
                $providers = $response->json();
                return view('proveedores', ['providers' => $providers]);
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

            // Verificar si el campo 'name', 'price' y 'description' están presentes en los datos de la solicitud
            $requestData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ]);

            // Realizar la solicitud POST a la API de productos incluyendo el token en los encabezados y los datos del nuevo producto
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post('http://localhost:8000/api/providers', $requestData);

            if ($response->successful()) {
                // Devolver una respuesta adecuada
                return response()->json('Proveedor creado exitosamente.', 201);
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
        ])->delete("http://localhost:8000/api/providers/$id");

        if ($response->successful()) {
            // Devolver una respuesta adecuada
            return redirect('/proveedores');
        } else {
            // Manejar errores de la API
            return response()->json(['message' => 'Error al eliminar el proveedor API'], $response->status());
        }
    } catch (\Exception $e) {
        // Manejar errores de la solicitud
        return response()->json(['message' => 'Error al eliminar el proveedor: ' . $e->getMessage()], 500);
    }
}
public function edit($id)
    {
        try {
            $token = Session::get('auth_token');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get("http://localhost:8000/api/providers/$id");

            if ($response->successful()) {
                $provider = $response->json();
                return view('editar_proveedor', compact('provider'));
            } else {
                return redirect()->route('providers.index')->with('error', 'Error al cargar el proveedor para editar');
            }
        } catch (\Exception $e) {
            return redirect()->route('providers.index')->with('error', 'Error al cargar el proveedor para editar: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $token = Session::get('auth_token');
            $requestData = $request->all();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->put("http://localhost:8000/api/providers/$id", $requestData);

            if ($response->successful()) {
                return redirect('/proveedores')->with('success', 'El proveedor ha sido actualizado correctamente.');
            } else {
                return redirect()->back()->with('error', 'Error al actualizar el proveedor');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el proveedor: ' . $e->getMessage());
        }
    }
}
