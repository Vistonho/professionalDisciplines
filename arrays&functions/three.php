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
    <!-- 
        1. КВАДРАТНОЕ УРОВНЕНИЕ
        2. ARRAY_MAP для одного массива и полностью переписать
        3. COUNT переписать
     -->

    <!-- ЗАДАНИЕ НОМЕР 3 -->
    <header class="header">
        <!-- <ul class="ul"> -->
        <?
        include "menu.php";
        ?>
        <!-- </ul> -->
    </header>

    <main class="main">
        <?php
        function MathQuadra(int $a = 1, int $b = 1, int $c = 1): array
        {
            $discriminant = $b * $b - 4 * $a * $c;

            $answer = [
                'status' => 'true',
                'data' => [
                    'message' => 'text',
                    'value' => [],
                ]
            ];

            if ($a != 0 && ($b != 0 || $c != 0)) {
                if ($discriminant > 0) {
                    $answer['data']['message'] = 'Уравнение имеет два корня';
                    $answer['data']['value']['x1'] = ((-1 * $b) + sqrt($discriminant)) / (2 * $a);
                    $answer['data']['value']['x2'] = ((-1 * $b) - sqrt($discriminant)) / (2 * $a);
                } else if ($discriminant == 0) {
                    $answer['data']['message'] = 'Уравнение имеет один корень';
                    $answer['data']['value']['x1'] = (-1 * $b) / (2 * $a);
                } else {
                    $answer['data']['value'] = 'Корней нет';
                }
                $answer['status'] = true;
            } else {
                $answer['status'] = false;
                $answer['data']['message'] = 'Неверные коэффициенты';
                $answer['data']['value'] = null;
            }
            return $answer;
        }

        // $mass = MathQuadra(3,-4,2);
        $mass = MathQuadra(1, -6, 9);
        // $mass = MathQuadra(0,0,9);
        // $mass = MathQuadra(9,2,3);
        
        // $result = $mass['status'] . '. ' . $mass['message'] . '. ';
        // if (isset($mass['value']))
        // {
        //     if (is_array($mass['value']))
        //     {
        //         $result .= 'Корни уравнения:';
        //         foreach ($mass['value'] as $key => $val)
        //         {
        //             $result .= " $key->$val";
        //         }
        //     } else {
        //         $result .= $mass['value'];
        //     } 
        // } 
        
        // var_dump($mass);
        

        // ЗАДАНИЕ НОМЕР 2
        $array = [1, 2, 3, 4, 5];
        $array1 = [5, 4, 3, 2, 1];
        $array2 = ['один', 'два', 'три', 'четыре', 'пять'];
        $array3 = [
            1 => [
                1,
                2,
                3,
            ],
            'asd' => [
                1,
                2,
                3,
            ]
        ];

        // $callback = function (array $array){
        //     return count($array);
        // };
        // function vitalik_map(?callable $callback, array $array)
        // {
        //     return $callback($array); 
        // }
        
        $callback = function (array $one, array $two) {
            return $one[0] . "-" . $two[0];
        };
        function vitaliks_map(?callable $callback, array $array, ?array $arrays)
        {
            if (is_null($callback) || !isset($arrays)) {
                $result = $array;
            } else {
                $result = $callback($array, $arrays);
            }
            return $callback($array, $arrays);
        }

        var_dump(vitaliks_map($callback, $array, $array1));
        // var_dump(vitaliks_map($callback, array_keys($array3), array_values($array3)));
        
        // $a = [1, 2, 3, 4, 5];
        // $b = ['one', 'two', 'three', 'four', 'five'];
        // function selfArrayMap(?callable $callback, array ...$arrs): array
        // {
        //     $res = [];
        //     if (!is_null($callback)) {
        //         if (count($arrs) > 1)
        //             foreach ($arrs[0] as $index => $val)
        //                 $res[$index] = $callback($val, $arrs[1][$index]);
        //         else foreach ($arrs[0] as $index => $val)
        //                 $res[$index] = $callback($val);
        //     } else {
        //         foreach ($arrs as $index => $val) {
        //             $res[$index] = [$val, $arrs[1][$index]];
        //         }
        //     }
        //     return $res;
        // }
        // $showSpanish = fn(int $n, string $m): string => "Число {$n} по-английски - {$m}";
        // $square = fn(int $n): int => $n ** 2;
        // $result = selfArrayMap($showSpanish, $a, $b);
        // $result = selfArrayMap(null, $a, $b);
        // $result2 = selfArrayMap($square, $a);
        // print_r($result);
        // echo "<br>";
        // print_r($result2);

        // ЗАДАНИЕ НОМЕР 3
        function vitalik_count(array $array, int $mode = 0)
        {
            $count = 0;
            foreach ($array as $arr) {
                $count++;
                if (is_array($arr) && $mode == 1) {
                    $count += vitalik_count($arr);
                }
            }
            return $count;
        }
        // echo vitalik_count($array3, 1);
        // echo ' ' . count($array3, 1);
        ?>
    </main>

</body>

</html>