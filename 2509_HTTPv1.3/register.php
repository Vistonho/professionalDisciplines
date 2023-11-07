<?php

// function clearPostData($data) {
//     return trim(strip_tags($data));
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sendRegister'])) {

        $login = trim(strip_tags($_POST['login']));
        $firstName = trim(strip_tags($_POST['firstName']));
        $lastName = trim(strip_tags($_POST['lastName']));
        $phone = trim(strip_tags($_POST['phone']));
        $email = trim(strip_tags($_POST['email']));
        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $userData = [
            'login' => $login,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'email' => $email,
            'passwordHash' => $passwordHash,
        ];

        if ($userData = json_encode($userData)) 
        {
            setcookie('userData', $userData, time() + 60*60*24*30);
        }
    }

    if (isset($_POST['logout'])) {
        setcookie('userData', $userData, time() - 1);
    }

    header('Location: ' . '../index.php');
    exit();
}