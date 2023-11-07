<?php
// если буфера нет, выдаст ошибку

setcookie('site', 'my_site', time() + 60*60*24*30);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // var_dump($_COOKIE);die;

    if (isset($_COOKIE['site'])) {
        echo "<div>Hello user_name!</div>";
    }
}