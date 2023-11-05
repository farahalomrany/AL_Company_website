<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ResponseTraits {


    public function sendResponse($result, $message, $errors)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'status_code' => 200,
            'errors' => $errors,

        ];

        return response()->json($response, 200);
    }


    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'status_code' => 404,

        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
