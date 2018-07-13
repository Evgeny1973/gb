<?php
function autoload($class) {
    $filename = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (!file_exists($filename)) {
        echo 'Файл ' . $filename . ' не найден.';
        exit;
    }
    require_once $filename;
}

spl_autoload_register('autoload');