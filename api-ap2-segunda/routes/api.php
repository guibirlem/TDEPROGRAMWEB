<?php
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/vendedor', [VendedorController::class,'listar']);
Route::post('/vendedor', [VendedorController::class,'salvar']);
Route::put('/vendedor/{id}', [VendedorController::class,'editar']);
Route::delete('/vendedor/{id}', [VendedorController::class,'excluir']);
Route::get('/vendedor/{id}', [VendedorController::class,'listarPeloId']);


Route::get('/produto', [ProdutoController::class,'listar']);
Route::post('/produto', [ProdutoController::class,'salvar']);
Route::put('/produto/{id}', [ProdutoController::class,'editar']);
Route::delete('/produto/{id}', [ProdutoController::class,'excluir']);
Route::get('/produto/{id}', [ProdutoController::class,'listarPeloId']);


