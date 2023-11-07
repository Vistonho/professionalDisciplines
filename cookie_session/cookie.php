<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['send'])) {
        // trim() нужен для удаления пробелов
        // strip_tags() нужен для удаления скриптов и тегов
        $login = trim(strip_tags($_POST['login']));
        $psw = trim(strip_tags($_POST['psw']));
        // var_dump($_POST);die;
        if ($login && $psw) {
            // echo "<div>login: $login</div><div>password: $psw</div>";
            setcookie('login', $login, time() + 60*60*24*30);
        }
        /* 
        *** Если написать в форму <script>alert('hack')</script>
        *** то команда успешно сработает, поэтому надо чистить
        *** входящие данные: trim() и strip_tags()
        */
    }

    if (isset($_POST['logout'])) {
        // способы удаления печенюшки:
        // setcookie('login');
        // setcookie('login', '');
        setcookie('login', $login, time() - 1);
    }

    header('Location:' . $_SERVER['SCRIPT_NAME']);
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (!isset($_COOKIE['login'])): ?>
        <form action="" method="post">
            <div>
                login:
                <input type="text" name="login" id="">
            </div>
            <div>
                password:
                <input type="text" name="psw" id="">
            </div>
            <div>
                <input type="submit" name="send" id="" value="Signin">
            </div>
        </form>
    <?php else: ?>
        <?php $login = $_COOKIE['login']; ?>
        <div>Hello <?= $login ?>!</div>
        <form action="" method="post">
            <input type="submit" name="logout" id="" value="Logout">
        </form>
    <?php endif; ?>

    <?php
        // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        //     // var_dump($_COOKIE);die;

        //     if (isset($_COOKIE['login'])) {
        //         $login = $_COOKIE['login'];
        //         echo "<div>Hello $login!</div>";
        //     }
        // }
    ?>

</body>

</html>