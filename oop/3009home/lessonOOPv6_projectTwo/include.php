<?php

/* 
* Автоматическое подключение всех классов и интерфейсов
*/

// ПЕРВЫЙ ВАРИАНТ
spl_autoload_register(function ($class) {
    $fileName = $class . '.php';
    $fileNameClass = $class . '.class.php';

    // if (file_exists($fileName)) {
    //     require_once $fileName;
    // } elseif (file_exists('inc/' . $fileName)) {
    //     require_once 'inc/' . $fileName;
    // } elseif (file_exists($fileNameClass)) {
    //     require_once $fileNameClass;
    // } elseif (file_exists('inc/' . $fileNameClass)) {
    //     require_once 'inc/' . $fileNameClass;
    // } 

    if (file_exists(__DIR__ . '/' . $fileName)) {
        require_once __DIR__ . '/' . $fileName;
    } elseif (file_exists(__DIR__ . '/' . 'inc/' . $fileName)) {
        require_once __DIR__ . '/' . 'inc/' . $fileName;
    } elseif (file_exists(__DIR__ . '/' . $fileNameClass)) {
        require_once __DIR__ . '/' . $fileNameClass;
    } elseif (file_exists(__DIR__ . '/' . 'inc/' . $fileNameClass)) {
        require_once __DIR__ . '/' . 'inc/' . $fileNameClass;
    } 
});

// ВТОРОЙ ВАРИАНТ ЧЕРЕЗ АНОНИМКУ
// spl_autoload_register(fn ($class) => {
//     if (file_exists($class . '.php')) { 
//         require_once $fileName;
//     } elseif (file_exists('inc/' . $class . '.php')) {
//         require_once 'inc/' . $class . '.php';
//     } elseif (file_exists($class . '.class.php')) {
//         require_once $fileNameClass;
//     } elseif (file_exists('inc/' . $class . '.class.php')) {
//         require_once 'inc/' . $class . '.class.php';
//     } 
// });

//ТРЕТИЙ ВАРИАНТ
// function class_autoload($class) {
//     $fileName = $class . '.php';
//     $fileNameClass = $class . '.class.php';

//     if (file_exists($fileName)) {
//         require_once $fileName;
//     } elseif (file_exists('inc/' . $fileName)) {
//         require_once 'inc/' . $fileName;
//     } elseif (file_exists($fileNameClass)) {
//         require_once $fileNameClass;
//     } elseif (file_exists('inc/' . $fileNameClass)) {
//         require_once 'inc/' . $fileNameClass;
//     } 
// }
// spl_autoload_register('class_autoload');


// НУЛЕВОЙ ВАРИАНТ
// require 'inc/Move.php';
// require 'inc/Eukaryote.class.php';

// require 'inc/Animal.class.php';
// require 'inc/Run.php';
// require 'inc/Swimming.php';

// require 'inc/Pet.class.php';

// require 'inc/Fish.class.php';