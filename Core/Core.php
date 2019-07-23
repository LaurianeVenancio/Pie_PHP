<?php

namespace Core;

class Core{
    public function run(){

        $string = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        require_once('routes.php');

        $cut = substr($string,strpos($string,"?"));
        $url = str_replace($cut,"",$string);
        if(!empty($url)){
            $tab = Router::get($url);
        }
        else{
            $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
            $tab = Router::get($url);
        }

        if (!is_null($tab)){

            $class = ucfirst($tab["controller"]) . "Controller";
            $method = $tab["action"] . "Action";
            $obj = "\Controller\\" . $class;

            if (class_exists("\Controller\\" . $class) && method_exists($obj, $method)) {
                $app = new $obj();
                $app->$method();
            }
            else {
                require_once('src/View/Error/404.php');
            }
        }
        else{
            require_once('src/View/Error/404.php');
        }

        //$method = $test[3] . "Action";

        /*if (!empty($test[2]) && !empty($test[3])) {
            $method = $test[3] . "Action";
            if (class_exists("\Controller\\" . $class) && method_exists($obj, $method)) {
                $app = new $obj();
                $app->$method();
            }
            else {
                require_once('src/View/Error/404.php');
            }
        }
        if (!empty($test[2]) && empty($test[3])) {
            if (class_exists("\Controller\\" . $class)) {
                $app = new $obj();
                $app->indexAction();
            }
            else {
                require_once('src/View/Error/404.php');
            }
        }
        if (empty($test[2]) && empty($test[3])){
            $app = new AppController();
            $app->indexAction();
        }*/
    }
}