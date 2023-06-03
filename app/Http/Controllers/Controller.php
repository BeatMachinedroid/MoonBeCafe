<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendJson($data = [], $message)
        {
            $Json = [
                'status' => 200,
                'message' => $message,
                'data' => $data
            ];

            return response()->json($Json);
        }

    public function sendError($message)
        {
            $Json = [
                'status' => 400,
                'message' => $message
            ];

            if(!empty($errormessage)){
                $Json['data'] = [$errormessage];
            }

            return response()->json($Json);
        }

    public function sendNot($data = [], $message)
        {
            $Json = [
                'status' => 244,
                'message' => $message,
                'data' => $data
            ];

            return response()->json($Json);
        }

    public function ServerEror($message)
    {
        $json = [
            'status' => 500,
            'message' => $message
        ];

        return response()->json($json);
    }
}
