<?php

    class Post{
        
        function __construct()
        {

        }

        public function createPost($data){
            $jsonDatos = json_decode(file_get_contents('datos.json', true));
            $generador = new HttpResponseGenerator();

            $repetido = false;
            foreach($jsonDatos->productos as $producto){
                if($producto->id == $data['id']){
                    $repetido = true;
                }
            }

            if($repetido == false){
                $jsonDatos->productos[] = $data;
                $jsonDatos = json_encode($jsonDatos);
                file_put_contents('datos.json', $jsonDatos);
                $datos = null;
                $mensaje = 'Creada la entrada';
                return $generador->generateResponse(201, $datos, $mensaje);
            }else{
                $datos = null;
                $mensaje = 'El id de la entrada ya esta ocupado';
                return $generador->generateResponse(400, $datos, $mensaje);
            }
            
        }

    }

?>