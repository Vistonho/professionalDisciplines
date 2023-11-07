<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['sendUserNumber'])) {

        $randomNumber = json_decode($_COOKIE['randomNumber']);

        // var_dump($_POST['userNumber']);
        // var_dump($randomNumber);

        if ($_POST['userNumber'] == $randomNumber->number)  
        {
            $randomNumber->answer = true;
            setcookie('randomNumber', json_encode($randomNumber), time() + 60*60*24*30);
        } else {
            $randomNumber->count = 1;
            setcookie('randomNumber', json_encode($randomNumber), time() + 60*60*24*30);
        }

        // var_dump($randomNumber);die;
    }

    

    if (isset($_POST['sendUserNumberReset'])) {
        setcookie('randomNumber', json_encode($randomNumber), time() - 1);
    }

    header('Location:' . '../index.php?page=about');
    exit();
}