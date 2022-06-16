<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AvaliacaoController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\CategoriaController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\DiaSemanaController;
use App\Http\Controllers\Web\HorarioController;
use App\Http\Controllers\Web\RestauranteController;
use App\Http\Controllers\Web\ReservasController;
use App\Http\Controllers\Web\MesaController;
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

Route::prefix('/horarios')->group(function(){
    Route::get('/diaSemana', [DiaSemanaController::class, 'index'])->middleware('auth', 'restaurante');
    Route::post('/create', [HorarioController::class, 'store'])->middleware('auth', 'restaurante');
});

Route::prefix('/mesas')->group(function(){
    Route::post('/create', [MesaController::class, 'store'])->middleware('auth', 'restaurante');
});

Route::prefix('/restaurantes')->group(function(){
    Route::get('/admin', [RestauranteController::class, 'dash'])->middleware('auth', 'restaurante');
    Route::get('/reservas', [RestauranteController::class, 'reservas'])->middleware('auth', 'restaurante');
    Route::get('/create', [RestauranteController::class, 'create'])->middleware('auth', 'restaurante');
    Route::post('/create', [RestauranteController::class, 'store'])->middleware('auth', 'restaurante');
    Route::put('/edit/{id}', [RestauranteController::class, 'update'])->middleware('auth', 'restaurante');
    

    Route::get('/', [RestauranteController::class, 'index']);
    Route::get('/{id}', [RestauranteController::class, 'show']);
});

Route::prefix('/clientes')->group(function(){
    Route::get('/{id}', [ClienteController::class, 'profile'])->middleware('auth', 'cliente');
    Route::match(array('PUT', 'PATCH'), "/{id}", [ClienteController::class, 'update'])->middleware('auth', 'cliente');
    Route::delete('/{id}', [ClienteController::class, 'destroy'])->middleware('auth', 'cliente');
});

Route::prefix('/reservas')->group(function(){
    Route::get('/{id}', [ReservasController::class, 'find']);
    Route::post('/create', [ReservasController::class, 'store'])->middleware('auth', 'cliente');
    Route::patch('/rejeitar/{id}', [ReservasController::class, 'rejeitar']);
    Route::patch('/aprovar/{id}', [ReservasController::class, 'aprovar']);
});



Route::prefix('/avaliacoes')->group(function(){
    Route::post('/create', [AvaliacaoController::class, 'store'])->middleware('auth', 'cliente');;
});

