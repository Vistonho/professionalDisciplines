<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (isset($_POST['send'])) {
        $login = trim(strip_tags($_POST['login']));
        $psw = trim(strip_tags($_POST['psw']));

        if ($login && $psw) {
            // var_dump($login, $psw);die;
            $_SESSION['user'] = [
                'login' => $login,
                'psw' => password_hash($psw, PASSWORD_BCRYPT),
            ];
        }
    }

    if (isset($_POST['logout'])) {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
    
    /*  */

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

    <?php if (!isset($_SESSION['user'])) : ?>
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
    <?php else : ?>
        <?php $login = $_SESSION['user']['login']; ?>
        <div>Hello <?= $login ?>!</div>
        <form action="" method="post">
            <input type="submit" name="logout" id="" value="Logout">
        </form>
    <?php endif; ?>


    <?php
    // if (isset($_SESSION['login'])) {
    //     echo "<div>Hello {$_SESSION['login']}!</div>";
    //     var_dump($_SESSION);
    // }
    ?>

</body>

</html>