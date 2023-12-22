<?php

    class HttpResponseGenerator{

        function __construct(){

        }

        //Genera una respuesta HTTP con formato para la API
        public function generateResponse($code, $data, $message){
            $codigo = intval($code);
            $response = new stdClass();
            $response->code = $code;
            //Si el codigo
            if($codigo < 300){
                $response->status = "success";
            }elseif($codigo <500){
                $response->status = "failure";
            }else{
                $response->statusd = "error";
            }
            $response->data = $data;
            $response->message = $message;
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
        }

    }

?>