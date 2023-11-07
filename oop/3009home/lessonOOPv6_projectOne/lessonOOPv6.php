<pre>
<?php

//класс должен быть гарантировано подключен
require 'inc/Pet.class.php';
require 'inc/Fish.class.php';

$cat = new Pet('Murzik', 'black', 5); 
$cat->addFood('meat');
$cat->addFood(['fish', 'milk']);

$dog = new Pet('Sharik', 'black'); 

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

if ($cat instanceof Move)
{
    // мой кот умеет двигаться
    // var_dump('cat is move');
    if ($cat instanceof Run) 
    {
        var_dump('cat is move and run');
    }
}

if ((new Fish('yellow', 4)) instanceof Swimming)
{
    var_dump('fish can swimming');
}

?>
</pre>