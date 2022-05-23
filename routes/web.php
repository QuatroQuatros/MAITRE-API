<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AvaliacaoController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\CategoriaController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\DiaSemanaController;
use App\Http\Controllers\Web\HorarioController;
use App\Http\Controllers\Web\RestauranteController;
use App\Http\Controllers\Web\UserController;
use App\Http\Middleware\Restaurante;
use Laravel\Jetstream\Role;

Route::get('/', [ClienteController::class, 'index'])->middleware('userAgent');
Route::get('/index', [ClienteController::class, 'index']);

Route::get('/app', function(){
    return view('app');
});
  
Route::get('/buscar', [RestauranteController::class, 'buscar']);

Route::post('/create/user', [UserController::class, 'store']);


Route::prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->middleware('auth', 'admin');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->middleware('auth', 'admin');
    Route::post('/categorias/create', [CategoriaController::class, 'store'])->middleware('auth', 'admin');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->middleware('auth', 'admin');

});

Route::prefix('/restaurantes')->group(function(){
    Route::get('/admin', [RestauranteController::class, 'dash'])->middleware('auth', 'restaurante');
    Route::get('/create', [RestauranteController::class, 'create'])->middleware('auth', 'restaurante');
    Route::post('/create', [RestauranteController::class, 'store'])->middleware('auth', 'restaurante');
    Route::put('/edit/{id}', [RestauranteController::class, 'update'])->middleware('auth', 'restaurante');

    Route::get('/', [RestauranteController::class, 'index']);
    Route::get('/{id}', [RestauranteController::class, 'show']);
});

Route::prefix('/clientes')->group(function(){
    Route::get('/', [ClienteController::class, 'profile'])->middleware('auth', 'cliente');
});


Route::prefix('/avaliacoes')->group(function(){
    Route::post('/create', [AvaliacaoController::class, 'store'])->middleware('auth', 'cliente');;
});

Route::prefix('/horarios')->group(function(){
    Route::get('/diaSemana', [DiaSemanaController::class, 'index']);
    Route::post('/create', [HorarioController::class, 'store']);
});
