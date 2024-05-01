<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    protected $apiBaseUrl;

    public function __construct()
    {
        // Define la URL base de tu API
        $this->apiBaseUrl = env('API_BASE_URL');
    }

    public function index()
    {
        $client = new Client();

        try {
            // Realizar una solicitud GET a la API para obtener todos los productos
            $response = $client->request('GET', $this->apiBaseUrl . '/products');

            // Obtener el cuerpo de la respuesta de la API
            $products = json_decode($response->getBody(), true);

            // Devolver los productos obtenidos
            return response()->json($products);
        } catch (\Exception $e) {
            // Manejar errores en caso de que ocurran
            return response()->json(['error' => 'Error al obtener productos: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        // Lógica para manejar la creación de un nuevo producto en la API
    }

    public function update(Request $request, $id)
    {
        // Lógica para manejar la actualización de un producto existente en la API
    }

    public function destroy($id)
    {
        // Lógica para manejar la eliminación de un producto existente en la API
    }
}

