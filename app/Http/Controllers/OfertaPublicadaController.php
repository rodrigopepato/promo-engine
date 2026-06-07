<?php

namespace App\Http\Controllers;

use App\Models\OfertaPublicada;

class OfertaPublicadaController extends Controller
{
    public function index()
    {
        return response()->json([
            'sucesso' => true,
            'ofertas_publicadas' => OfertaPublicada::latest()->limit(10)->get(),
        ]);
    }
}
