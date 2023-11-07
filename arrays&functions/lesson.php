<?php
$a = null;
$b = false;
?>
<!-- <div>null => <?= (int)$a ?></div>
<div>false => <?= (int)$b ?></div> -->




<?php

//Не проверять null как значение
//А проверять как состояние переменной
//SQL ->
//where
//field_name is NULL
// if (is_null($a)){
//     echo 'a -> null';
// }

$mas = [1 => 1, 2, 22 => 5, 6];

//добавление нового элемента
$mas[] = 10;

for ($a = 0; $a < 2; $a++)
{
    $mas[] = $a;
}

$mas[] = [2, 3, 4];

$mas = [
    'a' => 1,
    'b' => 2,
    'name' => 'Vitalik',
    20,
    4 => null,
    't' => false, 
    'c' => 2.2,
    'too' => [[['Milky Way!']]],
    // 'test' => [
    //     [
    //         [
    //             [], null, true,
    //         ],
    //         10
    //     ]
    // ],
    5 => 100,
];

// Вывод десятки из ключа test
// var_dump($mas['test'][0][1]);die;

array_push($mas, 50);
$mas = array_merge($mas, [20, 30, 40]);

foreach ($mas as $key => $val)
{

}

//ИЗМЕНЕНИЕ ЭЛЕМЕНТОВ ИЗ МАССИВА
//Увеличить элементы массива на единицу
$mas = [1, 2, 3, 4, 5];
foreach ($mas as $val)
{
    $val++;
    //Нияего не изменится
    //Потому что изменяется копия элемента массаива $val
    //а не сам массив
    //НИКОГДА НЕ ИЗМЕНЯЕМ МАССИВ ПО КОТОРОМУ ИДУТ ИТЕРАЦИИ
    //$mas[$key] = $val + 1; работать будет, но нельзя
}
foreach ($mas as &$val)
{
    $val++;
    //ссылка на элемент 
}
unset($val); //удаление ссылки

//УДАЛЕНИЕ ЭЛЕМЕНТОВ МАССИВА
//внутри foreach делать это не корректно
unset($mas[2]);

//foreach ДЛЯ РАЗНЫХ ТИПОВ ДАННЫХЪ
$mas = [];
$mas = 5;
if (is_array($mas) && count($mas))
{
    foreach($mas as $key => &$val)
    {
        $val += 1;
    }
    unset($val);
    unset($mas[2]);
    var_dump('end');
}

//ПРЕРЫВАНИЕ СКРИПТА 
$mas = [
    'a' => 1,
    'b' => 2,
    'name' => 'Vitalik',
    20,
    4 => null,
    't' => false, 
    'c' => 2.2,
    'too' => [[['Milky Way!']]],
    // 'test' => [
    //     [
    //         [
    //             [], null, true,
    //         ],
    //         10
    //     ]
    // ],
    5 => 100,
];

// var_dump(count($mas, 1));

// резкое
// die();
// плановое
// exit();

//КОНСТАНТЫ
const CONST_NAME = 2;
//магическая константа получает своё значение в момент исполнения скрипта
// var_dump(__LINE__);
// var_dump(__FILE__);
// var_dump(__DIR__);
//как правило, это отладочная информация

// РАБОТА СО СТРОКАМИ
$mas = [1, 2, 3, 4, 5];
var_dump($mas);

// var_dump(json_encode($mas));
// var_dump(serialize($mas));

// var_dump(json_decode(json_encode($mas)));
// var_dump(unserialize(serialize($mas)));

// ASCII таблица от 0 до 127 семи
$s = 'text'; 
$s = 'текст'; 
//кириллица кодируется 2 байтами
// var_dump($s);
// var_dump(strlen($s));
// var_dump(mb_strlen($s));
//функция для работы с многобайтной кодировкой

//ПРЕОБРАЗОВАНИЕ ЭЛЕМЕНТОВ МАССИВА В СТРОКУ
$mas = [1, 2, 3, 4, 5];
// var_dump(join('+', $mas));
// var_dump(explode('+', implode('+', $mas)));

$s = "Long \nlive \tthe \"Milky \\Way! \$";
//двойные ковычки позволяют делать интерполяцию и использовать спец символы
echo($s);
// \n отработает только в консоле или исходном коде
// HTML схлопнет все табуляции и переносы строк в один пробел
echo(nl2br($s)); //решение - функция nl2br()

/* 
ЗАДАНИЕ
Поработать с циклами, foreach, while.
Сделать таблицу Пифагора
*/




// var_dump($mas);