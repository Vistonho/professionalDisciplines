<pre>
<?php

/* 

INTERFACE - дополнительная способность 
Это класс, который содержит только абстрактные методы по умолачанию

*/

interface Move {}
interface Swimming {}
interface Run 
{
    //если животное умеет бегать, то будьте добры указать скорость его бега
    public function setSpeed(float $speed): void; //abstract method
}

abstract class Eukaryote implements Move
{
    public $is_live = true;
    protected $decorate_core = false;

    public function getIsLive()
    {
        return $this->is_live;
    }

    public function setIsLive($status)
    {
        $this->is_live = $status;
    }

    abstract function sleep();
    abstract function eat(string $food);
}

class Animal extends Eukaryote
{
    final const ANIMAL_IS_LIVE = false;

    public $count_paw = 4;
    public $hungry = true;
    public $color;

    public function __construct($color, $count_paw)
    {
        $this->color = $color;
        $this->count_paw = $count_paw ?? $this->count_paw;

        parent::setIsLive(true); 
    }

    public function eat(string $food)
    {
        var_dump('Animal poel');
        $this->hungry = false; 

        return !$this->hungry;
    }

    public function sleep() {}

}

class Pet extends Animal implements Run, Swimming
{
    const PET_IS_LIVE = true;
    public $like_foods = [];
    public $nick_name;
    public $say_sleep;

    private $speed;

    public function __construct(string $nick_name, string $color, int $count_paw = null)
    {
        $this->nick_name = $nick_name;
        parent::__construct($color, $count_paw);
    }

    public function eat(string $food) 
    {
        if (in_array($food, $this->like_foods)) {
            parent::eat($food);
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
                ...$this->like_foods, 
                ...$value, 
            ];
        }
    }

    public function __destruct()
    {
        echo $this->nick_name . ' is die... И это пройдёт.';
    }

    public function sleep()
    {
        return $this->say_sleep;
    }

    /* 
    указываем метод Run
    */
    public function setSpeed(float $speed): void{
        $this->speed = $speed;
    }

}

class Fish extends Animal implements Swimming
{

}

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