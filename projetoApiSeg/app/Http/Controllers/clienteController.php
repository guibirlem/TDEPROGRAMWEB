<?php

namespace App\Http\Controllers;

use App\Responses\ApiResponse;
use Illuminate\Http\Request;


class clienteController extends Controller
{
  public function salvar ()
  {

  }
  public function listar ()
  {
    return ApiResponse::success (data: ["nome" => "Lucas"]);
  }
  public function editar (int $id)
  {
    
  }
  public function excluir (int $id)
  {
    
  }


}
