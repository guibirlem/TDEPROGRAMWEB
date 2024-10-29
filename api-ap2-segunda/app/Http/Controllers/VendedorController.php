<?php
namespace App\Http\Controllers;

use App\Models\Vendedor;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Validator;


class VendedorController extends Controller 
{
    public function salvar (Request $request)
    {
        $validator = Validator::make($request->all(), [
           'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:150',
            'dataNascimento' =>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $vendedor = Vendedor::create($request->all());
        return ApiResponse::ok('vendedor salvo com sucesso', $vendedor);
    }

    public function listar()
    {
        $vendedores = Vendedor::all();
        return ApiResponse::ok('Lista de vendedores', $vendedores);
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:150',
            'dataNascimento' =>'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update($request->all());

        return ApiResponse::ok('Alteração feita com sucesso', $vendedor);
    }

    public function listarPeloId(int $id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return ApiResponse::ok('vendedor do ID', $vendedor);
    }

    public function excluir(int $id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();

        return ApiResponse::ok('vendedor deletado com sucesso', $vendedor);
    }
}

