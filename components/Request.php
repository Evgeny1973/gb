<?php

namespace components;


use Exceptions\Error404;

class Request {

    protected $controller = 'index';
    protected $action = 'index';
    protected $controllerNamespace = 'controllers';
    protected $inputArr = [
        'get' => [],
        'post' => [],
    ];

    public function init() {

        $url = $_SERVER['REQUEST_URI'];
        if ($cleanUrl = stristr($url, '?', true)) {
            $path = explode('/', $cleanUrl);
        } else {
            $path = explode('/', $url);
        }
        $this->inputArr['get'] = $_GET;
        $this->inputArr['post'] = $_POST;

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
                call_user_func_array([$instanceController, $action], [$this]);
            } else {
                throw new Error404('Метод ' . $action . ' не существует');
            }
        }
    }

    public function get($key = null) {
        if ((empty($key))) {
            return $this->inputArr['get'];
        }
        if (isset($this->inputArr['get'][$key])) {
            return $this->inputArr['get'][$key];
        }
        return null;
    }

    public function post($key = null) {
        if ((empty($key))) {
            return $this->inputArr['post'];
        }
        if (isset($this->inputArr['post'][$key])) {
            return $this->inputArr['post'][$key];
        }
        return null;
    }

}