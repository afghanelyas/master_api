<?php

namespace App\Traits;

trait HttpResponses
{
    protected function ok($message)
    {
        return response()->json(['message' => $message], 200);
    }

    protected function success($message, $statusCode = 200)
    {
        return response()->json(['message' => $message, 'status' => $statusCode], $statusCode);
    }

    protected function register($message, $statusCode = 200)
    {
        return response()->json(['message' => $message, 'status' => $statusCode], $statusCode);
    }
}
