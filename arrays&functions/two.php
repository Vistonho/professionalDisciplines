<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="master.css">
    <style>
        .odd {
            background-color: rgb(70, 70, 70);
        }

        .three {
            background-color: blue;
        }

        .square {
            background-color: green;
        }
    </style>
</head>
<body>

    <!-- ЗАДАНИЕ НОМЕР 3 -->
    <header class="header">
        <!-- <ul class="ul"> -->
            <?
                include "menu.php";
            ?>
        <!-- </ul> -->
    </header>

    <!-- ЗАДАНИЕ НОМЕР 2 -->
    <main class="main">
        <?php
        // // echo "Long live the Milky Way!";
        // echo "<table border='1'>";
        // $i = 0;
        // while ($i <= 10) {
        //     $j = 0;
        //     echo "<tr>";
        //     while ($j <= 10) {

        //         if ($i * $j == 0) {
        //             echo "<td>" . $i + $j . "</td>";
        //         } else {

        //             $style = '';
        //             if ($i * $j % 2 != 0) {
        //                 $style = 'odd';
        //             }
        //             if ($i * $j % 3 == 0) {
        //                 $style = 'three';
        //             }
        //             if ($i * $j == $i * $i) {
        //                 $style = 'square';
        //             }
        //             echo "<td class='$style'>" . $i * $j . "</td>";
        //         }

        //         $j++;
        //     }
        //     echo "</tr>";
        //     $i++;
        // }
        // echo "</table>";
        ?>
    </main>

    <main class="main">
        <table>
            <?php $i = 0; while($i < 11): ?>
                <tr>
                    <?php $j = 0; while($j < 11): ?>
                        <td style = " 
                            border-bottom: <?= ($i == 0 && $i * $j == 0) ? '3px solid black' : '' ?>;
                            border-right: <?= ($j == 0 && $i * $j == 0) ? '3px solid black' : '' ?>;
                            background-color: <?= (($i * $j == $i * $i) && $i * $j != 0) ? 'rgb(70, 70, 70)' : ((($i * $j % 2 != 0) && $i * $j != 0) ? 'green' : '') ?>;
                            color: <?= (($i * $j % 3 == 0) && $i * $j != 0) ? 'blue;' : '' ?>
                        ">
                        <?=
                            ($i + $j == 0) ? ' ' : (($i * $j == 0) ? ($i + $j) : ($i * $j))
                        ?>
                        </td>
                    <?php $j++; endwhile; ?>
                </tr>
            <?php $i++; endwhile ?>
        </table>
    </main>

</body>

</html>