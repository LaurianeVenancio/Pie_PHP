<?php
spl_autoload_register(function ($class) {
    $newclass = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    if (file_exists($newclass . '.php')) {
        require_once $newclass . '.php';
    }
    elseif (file_exists('src' .  DIRECTORY_SEPARATOR . $newclass . '.php')){
        require_once 'src' .  DIRECTORY_SEPARATOR . $newclass . '.php';
    }
});
?>
