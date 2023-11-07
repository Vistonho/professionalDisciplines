<?php

require_once 'Animal.class.php';

require_once 'Run.php';
require_once 'Swimming.php';

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
