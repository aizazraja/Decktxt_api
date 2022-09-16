<?php

namespace App\Http\Traits;

trait ApiResponse
{
    public function success($message, $data = [], $status = 200)
    {
        return response([
            'status' => true,
            'data' => $data,
            'msg' => $message,
        ], $status);
    }

    public function failure($message, $status = 422)
    {
        return response([
            'status' => false,
            'message' => $message,
        ], $status);
    }
    public function error_failure($message, $status = 500)
    {
        return response([
            'status' => false,
            'message' => $message,
        ], $status);
    }
}

?>