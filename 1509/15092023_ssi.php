<?php
    include 'inc/data.php';
    include 'inc/data(1).php';
    // переменная $a перетёрлась

    // задушивание ошибок: @
    // @include 'inc/headыыыыr.php';
    include 'inc/header.php';
    // если файл будет не найден, то код продолжит работу дальше.
    // Есть строгое подключение:
    require 'inc/header.php';
?>

    <div>
        <?= $a ?>
    </div>

<?php
    include 'inc/footer.php';

    // include 'inc/data.php';
    // при повторном подключении файла возникнет ошибка.
    // Избежать этого можно использовав:
    // include_once 'inc/data.php';
    // (аналогично require_once 'inc/data.php')

    // include вместо функции:
    // $c = include 'inc/data(2).php';
    // echo $c;
?>