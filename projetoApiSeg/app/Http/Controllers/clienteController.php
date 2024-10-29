<?php
#php artisan serve
namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class clienteController extends Controller
{
  public function salvar (Request $request)
    {
    $validator = Validator::make($request->all(), [
      'nome' => 'required|string|max:255',
      'cpf' => 'required|string|max:15',
     ]);

   if ($validator->fails()) {
    return ApiResponse::error($validator->errors (), 'Validation error');
    }
#(  $request->all());
    $customer = Cliente::create( $request->all ());
    return ApiResponse::ok('Cliente salvo com sucesso', $customer);
   }
  public function listar ()
  {
    # return ApiResponse::success (data: ["nome" => "Lucas"]);
    $costumers = Cliente::all();
    return ApiResponse::ok('Lista de clientes', $costumers);

  }

  public function listarPeloId (int $id)
  {
    $customer = Cliente::findOrFail($id);
    return ApiResponse::success( ' cliente do id ', $customer);
  }
  public function editar (Request $request , int $id)
  {
    {
      $validator = Validator::make($request->all(), [
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:15',
       ]);
  
     if ($validator->fails()) {
      return ApiResponse::error($validator->errors (), 'Validation error');
      }


      $customer = Cliente::findOrFail($id);
      $customer ->update ($request->all());

      return ApiResponse::ok('Alteração feita com sucesso', $customer);
     }
  }
  public function excluir (int $id)
  {
    $customer = Cliente::findOrFail($id);
        $customer->delete();
        return ApiResponse::success(' Cliente deletado com sucesso', $customer);
        
        #return response()->json([
        #    'status' => true,
        #    'message' => 'DELETADO COM SUCESSO'
       # ], 200);
  }


}
