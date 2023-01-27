<?php

namespace App\Traits;


Trait  ApiResponseTrait
{
     public function apiResponse($status = null, $message = null, $data = null){
        $array = [
            'status' => $status,
            'message' => $message,
            'data' => $data,

        ];

        return response($array);
    }
}