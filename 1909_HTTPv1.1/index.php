<?php
include "menu.php";

function addFile(string $dir, string $filename, string $extension) 
{
    $result = '';
    $file = "$dir/$filename.$extension";
    if (file_exists($file)) {
        if ($extension == 'css') {
            $result = "<link rel='stylesheet' href='$file'>";
        } 
        if ($extension == 'js') {
            $result = "<script async src='$file'></script>";
        }
    }
    return $result;
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
        if (isset($_GET['page'])){
            $page = $_GET['page'];
            echo addFile("css", $page, "css");
            echo addFile("js", $page, "js");
        }
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
        if (isset($_GET['page'])) {
            $pages = [
                'news' => 'page1',
                'about' => 'page2',
                'contact' => 'page3',
                'login' => 'page4',
            ];
            $fileName = 'pages/' . $pages[$page] . '.php';
            if (file_exists($fileName)) {
                include $fileName;
            }
        }
        
        // var_dump($_SERVER);die;
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


</body>

</html>