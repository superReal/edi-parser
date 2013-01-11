<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 20.12.12
 * Time: 10:15
 * To change this template use File | Settings | File Templates.
 */
spl_autoload_register(function ($class) {
    $paths = array('/src/', '/src/elements/', '/src/fields/', '/src/messages/');
    foreach($paths as $path) {
        if (file_exists(__DIR__ . $path . $class .'.php')) {
            require_once __DIR__. $path . $class . '.php';
        }
    }
});