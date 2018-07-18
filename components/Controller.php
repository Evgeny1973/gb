<?php

namespace components;

use Twig_Loader_Filesystem;
use Twig_Environment;


class Controller {

    protected function render($template, $params = []) {
        require_once __DIR__ . '/../vendor/autoload.php';
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates/');
        $twig = new Twig_Environment($loader);
        //session_start();
        echo $twig->render($template, ['params' => $params]);
    }
}