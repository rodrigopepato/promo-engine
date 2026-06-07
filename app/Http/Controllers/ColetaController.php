<?php

namespace App\Http\Controllers;

use App\Models\Coleta;

class ColetaController extends Controller
{
    public function index()
    {
        return response()->json([
            'sucesso' => true,
            'coletas' => Coleta::latest()->limit(10)->get(),
        ]);
    }
}
