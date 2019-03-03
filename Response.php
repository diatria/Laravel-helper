<?php
namespace App\Helper;

class Response
{
    private $responseType;
    private $responseCode;
    public function __construct(){
        $this->responseType = 'success';
        $this->responseCode = 200;
    }
    public function message($arrayData = []){
        return [
            'status' => $this->responseType,
            'code'=> $this->responseCode,
            'message' => !empty($arrayData['message']) ? $arrayData['message'] : '',
            'data' => !empty($arrayData['data']) ? $arrayData['data'] : [],
        ];
    }
    
    public function error($responseCode = 500){
        $this->responseType = 'failed';
        $this->responseCode = $responseCode;
        return $this;
    }
}