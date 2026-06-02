<?php

use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColetorOfertaController;

Route::post('/ofertas/processar', [OfertaController::class, 'processar']);

Route::post('/coletor/ofertas', [ColetorOfertaController::class, 'enviar']);
