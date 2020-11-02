<?php

namespace App\Http\Traits;

trait ResponseTrait
{
    public function responseMessage($message) {
        return response()->json([
            'message' => $message,
            'status' => 200
        ],200);
    }

    public function responseWithData($data) {
        return response()->json([
            'data' => $data,
            'status' => 200
        ],200);
    }
}
