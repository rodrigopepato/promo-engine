<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coleta;
use App\Models\OfertaPublicada;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalColetas' => Coleta::count(),
            'totalOfertasPublicadas' => OfertaPublicada::count(),
            'totalFalhas' => Coleta::sum('falhas'),
            'ultimasOfertas' => OfertaPublicada::latest()->limit(5)->get(),
            'ultimasColetas' => Coleta::latest()->limit(5)->get(),
        ]);
    }
}
