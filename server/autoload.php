<?php

spl_autoload_register(function ($class) {
    // Convert class name to a file path
    $file = __DIR__ .'/' . str_replace('\\', '/', $class) . '.php';
    
    // Check if the file exists
    if (file_exists($file)) {
        require_once $file;
    }
});
    
?>