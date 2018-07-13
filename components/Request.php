<?php

namespace components;


use Exceptions\Error404;

class Request {

    protected $controller = 'index';
    protected $action = 'index';
    protected $controllerNamespace = 'controllers';

    public function init() {

        $url = $_SERVER['REQUEST_URI'];
        $path = explode('/', $url);
        if (3 == count($path)) {
            $this->controller = $path[1];
            $this->action = $path[2];

        } elseif (2 == count($path) && !empty($path[1])) {
            $this->controller = $path[1];
        }

        $classController = $this->controllerNamespace . '\\' . ucfirst($this->controller) . 'Controller';
        $action = 'action' . ucfirst($this->action);

        if (class_exists($classController)) {
            $instanceController = new $classController;
            if (method_exists($instanceController, $action)) {
                call_user_func_array([$instanceController, $action], []);
            } else {
                throw new Error404('Метод ' . $action . ' не существует');
            }
        }
    }

}