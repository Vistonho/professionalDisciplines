<pre>
<?php

/* 
29.09.2023 
До этого мы использовали функциональный подход
Теперь будем использовать объектный подход.
Почему работать с объектами удобно? Потому что 
в реальной жизни нас окружают объекты. 

Атрибуты объекта - его характеристики, которые имеют какие-то значения.
*/

//$this - ссылка на текущий объект.

class Animal
{
    //атрибуты
    public $count_paw = 4;
    public $hungry = true;
    public $color;

    //методы
    public function __construct($color, $count_paw)
    {
        $this->color = $color;
        $this->count_paw = $count_paw ?? $this->count_paw;
    }

    //метод (то, что умеет делать класс)
    public function eat(string $food)
    {
        var_dump('Animal poel');
        $this->hungry = false; 

        return !$this->hungry;
    }
}

// это питомец
class Pet extends Animal //расширение Animal
{
    //относится к классу
    const PET_IS_LIVE = true;

    // public $color; //модификатор доступа, объявление переменная
    // public $count_paw = 4;
    // public $hungry = true; //питомец голодный по умолчанию
    public $like_foods = [];
    public $nick_name;

    /* 
    статические атрибуты.
    это атрибут класса, а не объекта
    */
    static $a = 5;
    static $count_pet = 0;


    //зарезервированные методы
    public function __construct(string $nick_name, string $color, int $count_paw = null)
    {
        // всегда отработает
        // var_dump('run' . __METHOD__);
        $this->nick_name = $nick_name;
        // $this->color = $color;
        // // $this->count_paw = $count_paw;  
        // $this->count_paw = $count_paw ?? $this->count_paw; 

        // вызов родительского метода
        parent::__construct($color, $count_paw);
        // self::$count_pet++; //или
        static::$count_pet++;
    }

    // //метод (то, что умеет делать класс)
    // public function eat(string $food) 
    // {
    //     if (in_array($food, $this->like_foods)) {
    //         $this->hungry = false; //$this - ссылка на имя экземпляра класса
    //     } else {
    //         $this->say();
    //     }

    //     return !$this->hungry;
    // }

    public function eat(string $food) 
    {
        if (in_array($food, $this->like_foods)) {
            parent::eat($food);
            /* 
            Перегрузка методов. Название родительского метода и дочернего совпадают.
            Расширение метода: в родительском методе досточно сменить $hungry на false, 
            которые значит, что животное поело, а уже в дочерних объектах, например, cat,
            можно накидать условия для "проверки входящей пищи".
            */
        } else {
            $this->say();
        }

        return !$this->hungry;
    }

    public function say($word = 'mau-mau')
    {
        return $word;
    }

    public function addFood(string|array $value)
    {
        if (is_string($value)) {
            $this->like_foods[] = $value;
        } else {
            $this->like_foods = [
                ...$this->like_foods, //аналог js'ного spead, разворачиваем массив по элементам
                ...$value, //оператор декомпозиции
            ];
        }
    }

    // public function getCountPet() //вызывается у объекта (нет static)
    public static function getCountPet() //вызывается у класса (static)
    {
        return 'count pet: ' . static::$count_pet . '<br>';
    }

    //уничтожение объекта
    public function __destruct()
    {
        //дополнительно
        echo $this->nick_name . ' is die... И это пройдёт.';
    }
}

// создание нового объекта на основе класса
$cat = new Pet('Murzik', 'black', 5); //здесь передаются значения, которые придут в конструктор для инициализации при создании объекта
// $cat->nick_name = 'Murzik';
// $cat->color = 'black';
$cat->addFood('meat');
$cat->addFood(['fish', 'milk']);

var_dump($cat);

// значение атрибутов можно менять
// var_dump($cat->count_paw);
// $cat->count_paw = 5;
// var_dump($cat->count_paw);

var_dump($cat->say('thanks'));
$cat->eat('milk');
var_dump($cat->hungry);

$dog = new Pet('Sharik', 'red', 10);
// var_dump($dog);

/* 
статические атрибуты
*/
// var_dump($cat->$a); //ошибка
// var_dump(Pet::$count_pet); //всё хорошо, если создать несколько экземпляров, то $count_pet будем увеличиваться

var_dump(Pet::getCountPet()); //пример статической функции, которая доступна только из класса

// var_dump(Pet::PET_IS_LIVE);



?>
</pre>