<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="multiplicTable.css">
</head>

<body>
    <!-- <div class="table">
        <div class="table__column">
            <div class="table__row">qwe1-10</div>
        </div>
    </div> -->

    <?php

    function showTable(int $num = 1): string
    {
        $result = "<a href='?num=1' class='homeButton'>Вернуться назад</a>";

        $getMulti = function (int $i, int $j): string {
            return "<div class='table__row'>"
                . "<a href='?num=$i'>$i</a> x "
                . (($j > 1 && $j < 10) ? "<a href='?num=$j'>$j</a>" : $j) . " = "
                . (($i * $j > 1 && $i * $j < 10) ? "<a href='?num=" . $i * $j . "'>" . $i * $j . "</a>" : $i * $j)
                . "</div>";
        };

        if (preg_match("/^[1-9]{1}$/u", $num)) {
            $result = "<div class='table'>";
            for ($i = 2; $i < 10; $i++) {
                $result .= "<div class='table__column'>";
                for ($j = 1; $j < 11; $j++) {
                    $result .= ($num > 1 && $num < 10) ? $getMulti($num, $j) : $getMulti($i, $j);
                }
                $result .= "</div>";

                if ($num > 1 && $num < 10) {
                    break;
                }
            }
            $result .= "</div>";
        } else {
            header('Location: ' . "multiplicTable.php");
            exit;
        }
        return $result;
    }
    
    ?>

</body>

</html>