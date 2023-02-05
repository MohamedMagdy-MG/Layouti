<?php 

namespace App\Http\Traits;

trait Response{
    public function ResponseData($data ,$message,$status = false,$code = 500,$error=null)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $status,
            'error' => $error
        ])->setStatusCode($code);
    }
}
