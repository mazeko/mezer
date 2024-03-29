<?php

namespace App\Helpers;

class ResponseFormatter {
    public static function success(int $status, $message, $data = [])
    {
        return [
            "status"  => $status,
            "message" => $message,
            "data"    => $data
        ];
    }
    
    public static function failed($status, $message, $error = "ERROR")
    {
        return [
            "status"  => $status != 0 ? $status : 500,
            "message" => $message,
            "errors"  => $error
        ];
    }
}