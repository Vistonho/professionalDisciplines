<pre>
<?php

abstract class Eukaryote //он имеет абстрактные методы 
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

    //должно будет спать. ДОЛЖНО БУДЕТ. 
    abstract function sleep();
    //мы наделяем будущий класс какими-то методами, которые только будут 
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

        parent::setIsLive(true); //!!!
    }

    public function eat(string $food)
    {
        var_dump('Animal poel');
        $this->hungry = false; 

        return !$this->hungry;
    }

    public function sleep()
    {
        //нам не нужно его реализовывать, поэтому можно оставить пустым
    }

}

class Pet extends Animal 
{
    const PET_IS_LIVE = true;
    // const ANIMAL_IS_LIVE = true;

    public $like_foods = [];
    public $nick_name;

    public $say_sleep;

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

}

$cat = new Pet('Murzik', 'black', 5); 
$cat->addFood('meat');
$cat->addFood(['fish', 'milk']);

$dog = new Pet('Sharik', 'black'); 

$animal = new Animal('red', 10);

$cat->say_sleep = 'mur-mur-mur';
var_dump($cat->sleep());

?>
</pre>