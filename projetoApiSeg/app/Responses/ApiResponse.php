<?php 

namespace App\Responses;



class ApiResponse
{
    public static function  success(?string $message = null , mixed $data = null)
    {
        return response() ->json( [
            "message" => $message,
            "data" => $data,
            "status" => "sucess"
        ], 200);
    }

    public function ok(string $message)
    {
        return self::success($message);
    }
//LARACAST WATCH EN DUBB


}