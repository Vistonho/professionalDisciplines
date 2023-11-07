<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
$cols = 10;
$rows = 10;
?>
<style>
table { border: 0; }
td { padding: 5px; text-align: center; }
</style>

<table>
<?php
for ($tr = 1; $tr <= $rows; $tr++)
{
    echo '<tr>';

    for($td = 1; $td <= $cols; $td++)
    {
        $background = 'white';
        if($cols === $rows)
        {
            if(($td * $tr %3)==0)
                $background = 'red';
        }
       

        echo '<td style="background-color:', $background, '">', $tr * $td, '</td>';
    }

    {
        $background = 'white';
        if($cols === $rows)
        {
            if($td === $tr)
                $background = 'blue';
        }
       

        echo '<td style="background-color:', $background, '">', $tr * $td, '</td>';
    }
    echo "</tr>";
    
}
?>
</table>
</body>
</html>




