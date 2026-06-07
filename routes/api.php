<?php

use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColetorOfertaController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ColetaController;
use App\Http\Controllers\OfertaPublicadaController;
use App\Services\MercadoLivre\MercadoLivreAuthService;

Route::post('/ofertas/processar', [OfertaController::class, 'processar']);

Route::post('/coletor/ofertas', [ColetorOfertaController::class, 'enviar']);

Route::get('/health', function () {
    try {
        DB::connection()->getPdo();

        return response()->json([
            'status' => 'ok',
            'app' => config('app.name'),
            'environment' => app()->environment(),
            'database' => 'ok',
            'timestamp' => now()->toIso8601String(),
        ]);
    } catch (\Throwable $exception) {
        return response()->json([
            'status' => 'error',
            'app' => config('app.name'),
            'environment' => app()->environment(),
            'database' => 'error',
            'message' => $exception->getMessage(),
            'timestamp' => now()->toIso8601String(),
        ], 500);
    }
});

Route::post('/coletor/executar', [ColetorOfertaController::class, 'executar']);

Route::get('/coletas', [ColetaController::class, 'index']);
Route::get('/ofertas-publicadas', [OfertaPublicadaController::class, 'index']);


Route::get('/mercadolivre/auth-url', function (MercadoLivreAuthService $service) {
    return response()->json([
        'url' => $service->gerarUrlAutorizacao(),
    ]);
});
