<?php

include "menu2209.php";

const mainUrl = "http://localhost/?page=news";

// var_dump($_SERVER);die;

/* Проверка на корректный URI */
if (isset($_GET['page'])) {
    $data = $_GET['page'];
    $count = 0;
    foreach (showUlElements() as $val) {
        if ($val['page'] == $data) {
            $count++;
        }
    }
    if (!$count) {
        header("location: " . mainUrl);
        exit;
    }
} else {
    header("location: " . mainUrl);
    exit;
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Виталик.ru</title>
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="bootstrap.min.css">

    <?php
    echo addContent($data, 'styles');
    echo addContent($data, 'scripts');
    ?>

</head>

<body>
    <!-- ЗАДАНИЕ НОМЕР 3 -->
    <header class="header">

        <?
        echo myMenu(showUlElements($styleLi_row, $styleA), showUl($styleUl_row));
        ?>

    </header>

    <main class="main">

        <?php
        echo addContent($data, 'files');
        ?>

    </main>

    <footer class="footer">

        <?
        echo myMenu(showUlElements($styleLi_column, $styleA), showUl($styleUl_column));
        ?>

        <div class="footer__copyright">
            <span style="font-size: 40px; font-weight: 700;">© CopyRight 2004 -
                <?= date('Y', time()) ?>
            </span>
            <span>Вы зашли на страницу
                <?= date('d.m.Y', time()) ?> в
                <?= date('H:i:s', time()) ?>
            </span>
        </div>

    </footer>

    <?php
    echo addContent($data, 'scripts', 0);
    ?>

</body>

</html>