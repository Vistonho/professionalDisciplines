<?php
        function func(string $userName = 'user', int $age = 24):void {
            // void пишется когда нет return 
            echo "<div>Long live the Milky Way! You $userName is $age old</div>";
            // return 1;
        }

        func('Vitalik');
        func(1, 'a'); //конвертация единички пройдёт успешно, а строки в число нет

        // Анонимная
        // Код со стороны разработчика фреймворка
        // $user = 
        // [
        //     'label' => 'name',
        //     'value' => function($data)
        //     {
        //         return "<div>Hello $data['userName'] - age $data['age']</div>";
        //     }
        // ]
        // echo $user['name']();

        foreach($user as $data)
        {
            echo '<div>' . $data['label'] . '</div>';
            echo $data['value']();
        }

        // --
        function userInfo(callable $func, array $data) :void{
            $func($data['userName'], $data['age']);
        }
        userInfo(function (string $userName = 'user', int|string $age = 10){
            echo "<div>Hello $userName, age - $age</div>";
        }, ['userName' => 'Vasya', 'age' => 20]);

        //СТРЕЛОЧНАЯ ФУНКЦИЯ
        $func = fn (string $userName = 'user', int|string $age = 18) =>
        sin(20);
    ?>