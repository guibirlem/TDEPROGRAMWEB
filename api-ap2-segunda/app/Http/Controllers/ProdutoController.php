<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Validator;


class ProdutoController extends Controller 
{
    public function salvar (Request $request)
    {
        $validator = Validator::make($request->all(), [
           'nome' => 'required|string|max:200',
            'preco' => 'required|string|max:150',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $Produto = Produto::create($request->all());
        return ApiResponse::ok('Produto salvo com sucesso', $Produto);
    }

    public function listar()
    {
        $Produtoes = Produto::all();
        return ApiResponse::ok('Lista de Produtoes', $Produtoes);
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|string|max:150',

        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $Produto = Produto::findOrFail($id);
        $Produto->update($request->all());

        return ApiResponse::ok('Alteração feita com sucesso', $Produto);
    }

    public function listarPeloId(int $id)
    {
        $Produto = Produto::findOrFail($id);
        return ApiResponse::ok('Produto do ID', $Produto);
    }

    public function excluir(int $id)
    {
        $Produto = Produto::findOrFail($id);
        $Produto->delete();

        return ApiResponse::ok('Produto deletado com sucesso', $Produto);
    }
}

