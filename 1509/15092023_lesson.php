<?php

/*
* РАБОТА С ДАТОЙ И ВРЕМЕНЕМ
*/

// var_dump(getdate());
// echo date('d.m.Y H:i:s', 1694762926);
// var_dump(time());
// echo date('d.m.Y H:i:s', time());

// Максимальное хранимое число в PHP
// echo(PHP_INT_MAX);

$h = date('H');
$min = date('i');
$s = date('s');
$m = date('m');
$d = date('d');
$y = date('y');

$time = mktime(23, 59, 59, 12, 31, 2023);

var_dump(date('d.m.Y H:i:s', mktime($h, $min, $s, $m, $d, $y+1)));
var_dump(date('d.m.Y H:i:s', mktime($h, $min, $s, $m+3, $d, $y)));
var_dump(date('d.m.Y H:i:s', mktime($h+20, $min, $s, $m, $d, $y)));

echo date('d.m.Y H:i:s', $time);

?>