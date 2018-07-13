<?php

namespace components;


trait Singleton {

    protected static $instance;

    public static function instance() {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function __construct() {
    }

    protected function __clone() {
    }

    protected function __sleep() {
    }

    protected function __wakeup() {
    }
}