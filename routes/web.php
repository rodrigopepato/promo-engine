<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromocaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/admin/promocoes/nova', [PromocaoController::class, 'create'])
    ->name('admin.promocoes.create');
