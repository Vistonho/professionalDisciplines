<?php

/* 
* Автоматическое подключение всех классов и интерфейсов
*/

spl_autoload_register(function ($class) {
    $fileName = $class . '.php';
    $fileNameClass = $class . '.class.php';

    if (file_exists(__DIR__ . '/' . $fileName)) {
        require_once __DIR__ . '/' . $fileName;
    } elseif (file_exists(__DIR__ . '/' . 'inc/' . $fileName)) {
        require_once __DIR__ . '/' . 'inc/' . $fileName;
    } elseif (file_exists(__DIR__ . '/' . $fileNameClass)) {
        require_once __DIR__ . '/' . $fileNameClass;
    } elseif (file_exists(__DIR__ . '/' . 'inc/' . $fileNameClass)) {
        require_once __DIR__ . '/' . 'inc/' . $fileNameClass;
    } elseif (file_exists(__DIR__ . '/' . 'inc/interface/' . $fileName)) {
        require_once __DIR__ . '/' . 'inc/interface/' . $fileName;
    } elseif (file_exists(__DIR__ . '/' . 'inc/models/' . $fileNameClass)) {
        require_once __DIR__ . '/' . 'inc/models/' . $fileNameClass;
    } 
});

