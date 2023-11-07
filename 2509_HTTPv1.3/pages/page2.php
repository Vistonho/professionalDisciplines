<?php

/* Генерация случайного числа */
if (!isset($_POST['randomNumber'])) {
    $randomNumber = json_encode([
        'number' => rand(1,20),
        'count' => 0,
        'answer' => false,
    ]);
    setcookie('randomNumber', $randomNumber, time() + 60*60*24*30);
}

    // var_dump(json_decode($randomNumber));

?>

<h1>Угадайте число</h1>

<form action="../randomAction.php" method="POST">
    <label for="userNumber">Введите число: </label>
    <input type="number" name="userNumber"> 
    <input type="submit" name="sendUserNumber" value="Проверить">
</form>

<?php 

if (isset($_COOKIE['randomNumber'])) {

    $randomNumber = json_decode($_COOKIE['randomNumber']);

    // var_dump($randomNumber);

    $result = '';
    if ($randomNumber->count == 1 && $randomNumber->answer == false) {

        $result .= "<div>Вы не угадали число. Машина загадала {$randomNumber->number}</div>";
    }
        
    if ($randomNumber->answer == true) {
        $result .= "<div>Вы угадали число {$randomNumber->number}</div>";
    }

    $result .= '<form action="../randomAction.php" method="POST">
            <input type="submit" name="sendUserNumberReset" value="Повторить">
            </form>';
    echo $result;
}

