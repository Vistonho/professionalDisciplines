<?php

/* 
ИСКЛЮЧЕНИЯ
это ситуация, когда мы можем управлять обработкой
ошибок или других нештатных ситуаций, которые
появляются во время выполнения скрипта. Если ситуация и мы 
должны понимать, что она произошло во время исполнения
кода, в каком конктреном месте, почему.
*/

function func(int $x, int $y): int {
    if ($y > 0) {
        return $x / $y;
    } else {
        throw new Exception("y = 0, на 0 делить нельзя");
    }

    /* 
    
    code

    как только выбрасывается исключение,
    каретка выполнения кода переходит
    в try/catch

    */
}

// try {
//     echo func(1, 0);
// } catch(Exception $e) {
//     var_dump($e->getMessage());
//     var_dump($e->getFile());
//     var_dump($e->getLine());
// } finally {
//     //finally отрабатывает всегда, если он указан
//     var_dump('end');
// }

class IntException extends Exception 
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function myMessage()
    {
        return "<div style='color: red;'>" . $this->getMessage() . "</div>";
    }
}

class StrException extends Exception
{
    public function myMessage()
    {
        return "<div style='color: green;'>" . $this->getMessage() . "</div>";
    }
}

class A 
{
    public function excep(mixed $a)
    {
        try {
            try {
                if (is_int($a))
                    throw new IntException('a is int!');
                if (is_string($a))
                    throw new StrException('a is str!');
            } catch(IntException|StrException $error) {
                // var_dump($error instanceof Exception);
                // var_dump($error->getMessage(), $error->getLine());
                echo $error->myMessage();
                throw $error;
            } /* catch(StrException $error) {
                echo $error->myMessage();
                throw $error;
            } */
        } catch(Exception $e) {
            var_dump($e->getMessage(), $e->getLine());
        }
    }
}

(new A)->excep('sa');
(new A)->excep(24);