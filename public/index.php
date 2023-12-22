<?php

    require '../core/Router.php';
    require '../app/Controllers/Post.php';
    require '../app/Controllers/Get.php';
    require '../app/Controllers/Delete.php';
    require '../app/Controllers/Put.php';

    $url = $_SERVER['QUERY_STRING'];

    $router = new Router();

    $router->add('public/get/all', array(
        'controller'=>'Get',
        'action'=>'getAll'
        )
    );

    $router->add('public/get/byId/{id}', array(
        'controller'=>'Get',
        'action'=>'getById'
        )
    );

    $router->add('public/post/create', array(
        'controller'=>'Post',
        'action'=>'createPost'
        )
    );

    $router->add('public/put/update/{id}', array(
        'controller'=>'Put',
        'action'=>'update'
        )
    );

    $router->add('public/delete/delete/{id}', array(
        'controller'=>'Delete',
        'action'=>'delete'
        )
    );

    $urlParams = explode('/', $url); //Separa los parametros

    $urlArray = array(
        'HTTP'=>$_SERVER['REQUEST_METHOD'],
        'path'=>$url,
        'controller'=>'',
        'action'=>'',
        'params'=>''
    );

    //Si la posicion 2 esta vacia directamente no tiene controlador
    if(!empty($urlParams[2])){
        $urlArray['controller'] = ucwords($urlParams[2]);
        //Si la 3 esta vacia no tiene action
        if(!empty($urlParams[3])){
            $urlArray['action'] = ucwords($urlParams[3]);
            //Si la 4 esta vacia no tiene parametros
            if(!empty($urlParams[4])){
                $urlArray['params'] = $urlParams[4];
            }
        }else{
            $urlArray['action'] = 'index';
        }
    }else{
        $urlArray['controller'] = 'Home';
        $urlArray['action'] = 'index';
    }

    if($router->matchRoutes($urlArray)){

        $method = $_SERVER['REQUEST_METHOD'];

        $params = [];

        if($method === 'GET'){
            $params[] = intval($urlArray['params']) ?? null;
        }elseif ($method === 'POST'){
            $json = file_get_contents('php://input');
            $params[] = json_decode($json,true);
        }elseif ($method === 'PUT'){
            $id = intval($urlArray['params']) ?? null;
            $json = file_get_contents('php://input');
            $params[] = $id;
            $params[] = json_decode($json,true);
        }elseif ($method === 'DELETE'){
            $params[] = intval($urlArray['params']) ?? null;
        }

        $controller = $router->getParams()['controller'];
        $action = $router->getParams()['action'];

        $controller = new $controller();
        if(method_exists($controller, $action)){
            $resp = call_user_func_array([$controller, $action], $params);
        }
    }else{
        //http_response_code(404);
        echo 'error 404'."\n";
        echo $urlArray['controller']."\n";
        echo $urlArray['action']."\n";
        echo $urlArray['path']."\n";
        echo $_SERVER['REQUEST_METHOD'];
    }

?>