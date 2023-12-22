<?php

    class Put{
        
        function __construct(){

        }

        public function update($id, $data){
            $jsonDatos = json_decode(file_get_contents('datos.json', true));
            $generador = new HttpResponseGenerator();

            $existe = false;
            foreach($jsonDatos->productos as $producto){
                //Comprobamos que exista el id y que, si le pasamos un id en los datos, sea el mismo o que no haya id
                if($producto->id == $id && (!array_key_exists('id', $data) || $data['id'] == $id)){
                    $existe = true;
                    if(!array_key_exists('id', $data)){
                        $data['id'] = $id;
                    }
                    $jsonDatos->productos[$id] = $data;
                }
            }

            if($existe == true){
                $datos = $jsonDatos;
                $jsonDatos = json_encode($jsonDatos);
                file_put_contents('datos.json', $jsonDatos);
                $mensaje = 'Actualizada la entrada';
                return $generador->generateResponse(200, $datos, $mensaje);
            }else{
                $datos = null;
                $mensaje = 'El id de la entrada no existe';
                return $generador->generateResponse(400, $datos, $mensaje);
            }
        }

    }

?>