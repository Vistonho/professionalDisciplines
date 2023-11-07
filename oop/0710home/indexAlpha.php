<pre>
<?php

require 'include.php';

// $cat = new Pet(color: 'black', count_paw: 5, nick_name: 'Murzik'); 

$cat = new Pet([
    'nick_name' => 'Murzik',
    'color' => 'black',
    'count_paw' => 4,
]);

$cat->addFood('meat');
$cat->addFood(['fish', 'milk']);

// $dog = new Pet('Sharik', 'black'); 

$dog = new Pet([
    'nick_name' => 'Sharik',
    'color' => 'black',
    'count_paw' => 4,
]);

$animal = new Animal('red', 10);

/* 
Проверка есть ли в иерархии классов реализация какого-то
интерефейса, или какой-то текущий объект принадлежит какому-то 
классу в иерархии
*/

if ($cat instanceof Animal)
{
    // $cat содержит в своей иерархии Animal
    var_dump('cat is Animal');
}

if ($cat instanceof IMove)
{
    // мой кот умеет двигаться
    // var_dump('cat is move');
    if ($cat instanceof IRun) 
    {
        var_dump('cat is move and run');
    }
}

if ((new Fish('yellow', 4)) instanceof ISwimming)
{
    var_dump('fish can swimming');
}

echo $cat->petInfo();

?>
</pre>