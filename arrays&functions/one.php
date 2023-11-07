<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="bootstrap.min.css">
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

    <!-- ЗАДАНИЕ НОМЕР 1 -->
    <main class="main">
        <?php
        // // echo "Long live the Milky Way!";
        // echo "<table border='1'>";
        // for ($i = 0; $i <= 10; $i++) {
        //     echo "<tr>";
        //     for ($j = 0; $j <= 10; $j++) {
        //         // echo "<td>";
        //         // if ($i * $j == 0) {
        //         //     echo $i + $j;
        //         // } else {
        //         //     echo $j * $i;
        //         // }
        //         // echo "</td>";
        //         if ($i * $j == 0) {
        //             echo "<td>" . $i + $j . "</td>";
        //         } else {

        //             $style = '';
        //             if ($i * $j % 2 != 0) {
        //                 $style = 'rgb(70, 70, 70)';
        //             }
        //             if ($i * $j % 3 == 0) {
        //                 $style = 'blue';
        //             }
        //             if ($i * $j == $i * $i) {
        //                 $style = 'green';
        //             }
        //             echo "<td style='background-color: $style;'>" . $i * $j . "</td>";
        //         }
        //     }
        //     echo "</tr>";
        // }
        // echo "</table>";
        ?>
    </main>

        <main class="main">
        <table>
            <?php for($i = 0; $i <= 10; $i++): ?>
                <tr>
                    <?php for($j = 0; $j <= 10; $j++): ?>
                        <td style = " 
                            <?php 
                                // if ($i * $j != 0) {
                                //     $style = '';
                                //     if ($i * $j % 2 != 0) {
                                //         $style .= 'background-color: rgb(70, 70, 70);';
                                //     }
                                //     if ($i * $j % 3 == 0) {
                                //         $style .= 'color:blue;';
                                //     }
                                //     if ($i * $j == $i * $i) {
                                //         $style .= 'background-color:green;';
                                //     }
                                //     echo $style;
                                // }
                            ?>
                            border-bottom: <?= ($i == 0 && $i * $j == 0) ? '3px solid black' : '' ?>;
                            border-right: <?= ($j == 0 && $i * $j == 0) ? '3px solid black' : '' ?>;
                            background-color: <?= ($i * $j == 0) ? 'yellow' : ((($i * $j == $i * $i) && $i * $j != 0) ? 'rgb(70, 70, 70)' : ((($i * $j % 2 != 0) && $i * $j != 0) ? 'green' : '')) ?>;
                            
                            color: <?= (($i * $j % 3 == 0) && $i * $j != 0) ? 'blue;' : '' ?>
                        ">
                            <?=
                                ($i + $j == 0) ? ' ' : (($i * $j == 0) ? ($i + $j) : ($i * $j))
                                
                                // if ($i * $j == 0) {
                                //     echo $i + $j;
                                // } else {
                                //     echo $i * $j;
                                // }
                            ?>
                        </td>
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
        </table>
    </main>

</body>

</html>