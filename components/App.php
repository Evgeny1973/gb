<?php

namespace components;


use Exceptions\Error404;

class App {
    public $request = null;
    public $auth = null;

    public function __construct() {
        $this->request = new Request;
        try {
            $this->request->init();
        } catch (Error404 $e) {
        }

    }

}