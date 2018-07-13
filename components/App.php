<?php

namespace components;


class App {
    public $request = null;
    public $auth = null;

    public function __construct() {
        $this->request = new Request;
        $this->request->init();

    }

}