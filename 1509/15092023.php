<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
<?php
    /*
    *   $position =
    *   1 - row
    *   0 - column
    */

    function showNumbers(int $end, int $position) :string 
    {
        $style = ($position) ? "style='display: flex;'" : "";

        $result = "<div{$style}>";
        
        for ($i = 1; $i <= $end; $i++)
        {
            $result .= "<div>$i</div>";
        }
        $result .= "</div>";

        return $result;
    }

    echo showNumbers(10, 1);
    echo showNumbers(10, 0);
?>
</body>

</html>


