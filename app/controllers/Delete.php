<?php

    class Delete{
        
        function __construct(){

        }

        public function delete($id){
            $jsonDatos = json_decode(file_get_contents('datos.json', true));
            $generador = new HttpResponseGenerator();

            $existe = false;
            foreach($jsonDatos->productos as $producto){
                if($producto->id == $id){
                    $existe = true;
                    unset($jsonDatos->productos[$id]);
                }
            }

            if($existe == true){
                $datos = $jsonDatos;
                $jsonDatos = json_encode($jsonDatos);
                file_put_contents('datos.json', $jsonDatos);
                $mensaje = 'Eliminada la entrada';
                return $generador->generateResponse(200, $datos, $mensaje);
            }else{
                $datos = null;
                $mensaje = 'El id de la entrada no existe';
                return $generador->generateResponse(400, $datos, $mensaje);
            }
        }

    }

?>