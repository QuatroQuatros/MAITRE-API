<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\CategoriaRestauranteController;
use App\Http\Controllers\Api\RestauranteController;
use App\Http\Controllers\Api\ReservasController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\HorarioController;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AvaliacaoController;
use App\Http\Controllers\Api\PratoController;
use App\Http\Controllers\Api\PratoEspecialController;
use App\Http\Middleware\Restaurante;
use Illuminate\Support\Facades\Route;



use App\Models\User;


Route::get('/', function(){
    return "4.444";
});


Route::apiResource('/clientes', ClienteController::class);
Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/categoria-restaurantes', CategoriaRestauranteController::class);
Route::apiResource('/restaurantes', RestauranteController::class);
Route::apiResource('/horarios', HorarioController::class);
Route::apiResource('/avaliacoes', AvaliacaoController::class);
Route::apiResource('/user', UserController::class);
Route::apiResource('/pratos', PratoController::class);
Route::apiResource('/pratos/especiais', PratoEspecialController::class);

Route::get('/user/photo', [UserController::class, 'teste']);

Route::apiResource('/reservas/rejeitar', ReservasController::class);


Route::get('/premium', [RestauranteController::class, 'premium']);
Route::patch('/restaurantes/premium/{id}', [RestauranteController::class, 'getPremium']);
Route::patch('/restaurantes/premium/cancelar/{id}', [RestauranteController::class, 'cancelPremium']);
Route::get('/restaurantes/restore/{id}', [RestauranteController::class, 'restore']);


Route::patch('/atualizar/telefone/{id}', [ClienteController::class, 'updateFone']);


Route::get('/teste', function(){
    return response()->json(['mensagem' => '4444 gostoso']);
})->middleware('auth:sanctum');


Route::get('/image', [RestauranteController::class, 'getImage']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;








