<?php
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cliente', [ClienteController::class,'listar']);
Route::post('/cliente', [clienteController::class,'salvar']);
Route::put('/cliente/{id}', [clienteController::class,'editar']);
Route::delete('/cliente/{id}', [clienteController::class,'excluir']);


