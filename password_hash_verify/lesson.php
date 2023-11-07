<?php

/* 
***
*** ТЕМА: пароли / механизм работы с паролями 
***
*/

// есть форма с которой прилетает пароль
$password = '123';

// хеш числа это набор символов из какого-то числа
// полученный в результате математических операций
// $hash = md5($password);
// $hash = sha1($password);
// не рекомендуется использовать

$hash = password_hash($password, PASSWORD_BCRYPT);
var_dump($hash);

// if (password_hash($password, PASSWORD_BCRYPT) == $hash) {
if (password_verify($password, $hash)) {
    echo "okay";
} else {
    echo 'bad';
}
