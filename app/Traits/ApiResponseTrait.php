<?php 
namespace App\Traits;

trait ApiResponseTrait{
    public function success( $message,  $data=[]){
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
        return response()->json($response,200);
    }
    public function fail( $message,  $data=[]){
        $response = [
            'success' => false,
            'data' => $data,
            'message' => $message, 
        ];
        return response()->json($response,500);
    }
}