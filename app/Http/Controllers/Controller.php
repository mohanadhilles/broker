<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result , $message){
        $response = [
            'code'  => 200,
            'success' => true ,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response , 200);
    }

    public function sendError($error , $errorMessages = [] , $code = 404){
        $response = [
            'code'  => 404,
            'success' => false ,
            'message' => $error
        ];
        if (!empty($errorMessages)) {

            $response['date'] = $errorMessages;
        }
        return response()->json($response , $code);

    }
}
