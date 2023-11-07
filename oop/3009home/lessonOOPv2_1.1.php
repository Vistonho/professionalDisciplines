<pre>
<?php

// FINAL можно применить к классу, тогда нельзя будет создавать потомком 
class Animal
{
    //константой владеет только класс, объекты не могут на них влиять
    //по-умолчанию PUBLIC
    // const ANIMAL_IS_LIVE = false;
    final const ANIMAL_IS_LIVE = false;

    public $count_paw = 4;
    public $hungry = true;
    public $color;

    private $a = 5; //получить доступ к этому свойству, можно только из этого класса

    protected $c = 2; //свойсва и методоты, к которым можно обращаться внутри классов и обектов в которых они были созданы, в том числе и в их потомках

    public function __construct($color, $count_paw)
    {
        $this->color = $color;
        $this->count_paw = $count_paw ?? $this->count_paw;
    }

    public function eat(string $food)
    {
        var_dump('Animal poel');
        $this->hungry = false; 

        return !$this->hungry;
    }

    //используя публичыный метод, мы можем получить доступ к privat извне 
    public function getA()
    {
        // return $this->a;
        return $this->calc($this->a, $this->a);
    }

    public function setA($a)
    {
        return $this->a = $a;
    }

    private function calc($x, $y)
    {
        //метод, который используется ТОЛЬКО внутри класса Animal
        return $x * $y;
    }

    public function getC()
    {
        return $this->c . ' ' . __METHOD__;
    }

    protected function getC_protected()
    {
        return $this->getC(); 
    }

    // final public function reloadMethod() //ошибка
    // FINAL говорит о том, что метод нельзя перезаписывать 
    public function reloadMethod()
    {
        return __METHOD__;
    }
}

class Pet extends Animal 
{
    const PET_IS_LIVE = true;
    // const ANIMAL_IS_LIVE = true;

    public $like_foods = [];
    public $nick_name;

    static $a = 5;
    static $count_pet = 0;

    public function __construct(string $nick_name, string $color, int $count_paw = null)
    {
        $this->nick_name = $nick_name;
        parent::__construct($color, $count_paw);
        static::$count_pet++;
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

    public static function getCountPet() 
    {
        return 'count pet: ' . static::$count_pet . '<br>';
    }

    public function __destruct()
    {
        echo $this->nick_name . ' is die... И это пройдёт.';
    }

    //обращение к родительскому методу для возвращения privat
    public function get2A()
    {
        return parent::getA() . parent::getA();
    }

    //обращение к защищенному методу
    public function getAc()
    {
        return $this->c;
    }

    public function getC_protectedA()
    {
        //создали в потомке родительский защищенный метод
        return $this->getC_protected() . ' ' . __METHOD__;
    }

    public function reloadMethod() //ПЕРЕГРУЗКА МЕТОДА
    {
        //переобределение метода
        // return __METHOD__;
        return parent::reloadMethod() . ' ' . __METHOD__;
    }

}

$cat = new Pet('Murzik', 'black', 5); 
$cat->addFood('meat');
$cat->addFood(['fish', 'milk']);

$animal = new Animal('red', 10);
/* 

PRIVAT

*/
// $cat->setA(10);
// $animal->setA(90);
// var_dump($animal->getA());
// var_dump($cat->get2A());

/* 

PROTECTED

*/
// var_dump($animal->c); //ошибка
// var_dump($cat->getAc());
// var_dump($animal->getC());

// var_dump($animal->getC_protected()); //ошибка
// var_dump($cat->getC_protectedA());

/* 

ПЕРЕГРУЗКА

*/
// var_dump($animal->reloadMethod());
// var_dump($cat->reloadMethod());

/* 

CONST

*/
// Animal::ANIMAL_IS_LIVE = 10; //так делать нельзя
// а с помощью дочернего метода, можно переписать родительскую константу
var_dump(Animal::ANIMAL_IS_LIVE);
var_dump(Pet::ANIMAL_IS_LIVE);

?>
</pre>