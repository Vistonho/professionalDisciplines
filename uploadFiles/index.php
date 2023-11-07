<?php
    session_start();
    define('PSW', password_hash('123', PASSWORD_BCRYPT));

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (isset($_POST['reg'])) {
            // var_dump($_FILES);
            // sleep(5);
            // die;
            $login = trim(strip_tags($_POST['login']));
            if ($login && password_verify($_POST['psw'], PSW)) {

                if (isset($_FILES['avatar']) && empty($_FILES['avatar']['error'])) {

                    $extension = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.'));

                    $fileName = random_int(1,100) . "_" . time() . $extension;

                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'upload/' . $fileName)) {
                        $_SESSION['user'] = [
                            'login' => $login,
                            'img' => 'upload/' . $fileName,
                        ];
                    }

                }

            }
        }

        if (isset($_POST['logout'])) {
            
            if (file_exists($_SESSION['user']['img'])) {
                unlink($_SESSION['user']['img']);
            }

            session_destroy();

        }

        header('Location: ' . $_SERVER['SCRIPT_NAME']);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])): ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div>login: <input type="text" name="login" value="123"></div>
        <div>password: <input type="password" name="psw" value="123"></div> 
        <div>avatar: <input type="file" name="avatar"></div>
        <input type="submit" value="Регистрация" name="reg">
    </form>

    <?php else: ?>

    <form action="" method="POST">
        <img src="<?= $_SESSION['user']['img'] ?>" alt="img" style="width: 50px">
        <div>user: <?= $_SESSION['user']['login'] ?> </div>
        <div><input type="submit" value="Выход" name="logout"></div>
    </form>

    <?php endif ?>
</body>
</html>