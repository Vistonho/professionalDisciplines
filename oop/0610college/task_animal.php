<?php

class Irbis 
{
    /* 
    *
    * СВОЙСТВА
    *
    */
    public $weight; // вес
    public $length; // длина
    public $numberOfPaws = 4; // кол-во лап
    public $eyeColor; // цвет глаз
    public $age; // возраст
    public $gender; // гендер (пол)
    public $hungry = true; // голод 
    public $likeFood = ['meat', 'sheepmeat', 'water']; // любимая еда
    public $virus = false;
    public $totalVirusTime = 0; //общее время болезни
    public $vitalEnergy = 10; // (*) уровень жизненной энергии
    public $totalSleepTime = 0; //общее время сна
    /* 
    *
    * МЕТОДЫ
    *
    */
    public function __construct(int $weight, int $length, string $eyeColor, int $age, string $gender)
    {
        $this->weight = $weight;
        $this->length = $length;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
        $this->gender = $gender;
    }
    public function action (string $action) :string
    {
        // (*) Совершение какого-то действия

        if ($this->checkVitalEnergy())
        {

            $result = "ЗВЕРЬ: ";
            switch ($action) 
            {
                case "sleep":
                    self::sleep();
                    $result .= "Совершил сладкое сопение...";
                    break;
                case "eat":
                    self::eat();
                    $result .= "Совершил поедание воды...";
                    break;
                case "talk":
                    self::talk();
                    $result .= "Совершил движение пастью...";
                    break;
                default:
                    $this->checkVirus();
                    $result .= $action;
            }
            return $result;

        } else {
            return "Действие невозможно. " . $this->getVitalEnergy();
        }
        
    }

    public function try (string $action) :string
    {
        // Проверка какого-либо свободного действия 

        if ($this->checkVitalEnergy() && $this->checkVirus()) 
        {

            return "ЗВЕРЬ: $action " . ((rand(0,1) ? '(удачно)' : '(неудачно)'));

        } else {
            return "Действие невозможно. " . $this->getVitalEnergy();
        }
    }
    public function sleep(int $hours = 14) :string
    {
        // (*) Восстановление жизненной энергии

        $result = '';

        if ($this->checkVitalEnergy() && $this->checkVirus())
        {

            if (!($hours <= 0)) {
                $this->totalSleepTime += $hours;
                $result = "БАРС: Добрый мир, добрый...";
            } else {
                $result = "СИСТЕМА: проверьте входные данные!";
            } 
            
            self::talk($result);
            $this->setVitalEnergy($hours);

        } else {
            $result = "Действие невозможно. " . $this->getVitalEnergy();
        }

        return $result;
    }
    public function eat(string $food = "water") :string
    {
        // Восстановление жизненной энергии и утоление голода

        $result = "";

        if ($this->checkVitalEnergy() && $this->checkVirus())
        {

            if (in_array($food, $this->likeFood)) {
                $this->hungry = false; 
                $this->setVitalEnergy(10);
                $result = "Спасибо, было очень вкусно!";
            } else {
                $result = "Спасибо, ешь сам такое!!!";
            }
            $result = $this->talk($result);

        } else {
            $result = "Действие невозможно. " . $this->getVitalEnergy();
        }
        return $result;
    }
    public function checkHungry() :string
    {
        return "СИСТЕМА: " . ((!$this->hungry) ? "|Зверь сыт|" : "|Зверь голоден|");
    }
    public function talk(string $word  = "р-р-р... я большой и страшный барс!") :string
    {
        // Голос

        $result = '';

        if ($this->checkVitalEnergy() && $this->checkVirus()) {

            $result = "ЗВЕРЬ: $word";

        } else {
            $result = "Действие невозможно. " . $this->getVitalEnergy();
        }

        return $result;
    }
    public function addFood(string|array $food) :string
    {
        // Добавление возможной поглощаемой пищи
        if (is_string($food)) {
            $this->likeFood[] = $food;
        } else {
            $this->likeFood = [
                ...$this->likeFood,
                ...$food,
            ];
        }
        return "СИСТЕМА: |Возможная пища успешно добавлена|";
    }
    public function setVirus(bool $virus) :string
    {
        // Заражение вирусом
        $this->totalVirusTime = 0;
        $this->virus = $virus;
        return "СИСТЕМА: " . (($virus) ? "|Болезнь активирована|" : "|Болезнь деактивирована|");
    }
    public function checkVirus () :string
    {
        // Проверка на наличие болезни
        if ($this->virus) {
            $this->totalVirusTime += 1;
            $this->setVitalEnergy($this->totalVirusTime * 2 * -1);
        } 
        return $this->getVirus();
    }
    public function getVirus()
    {
        return ($this->virus) ? "|Зверь здоров|" : "|Зверь болен|";
    }
    public function checkVitalEnergy ()
    {
        // Проверка жизненной энергии
        return ($this->vitalEnergy <= 0) ? false : true;
    }
    public function getVitalEnergy()
    {
        return "СИСТЕМА: Запас жизненной энергии = " . $this->vitalEnergy;
    }
    public function setVitalEnergy(int $energy)
    {
        // Установка жизненной энергии
        $this->vitalEnergy += $energy;
        return $this->getVitalEnergy();
    }

    public function changeVitalEnergy(int $energy, string $char)
    {
        //Изменение энергии
        if ($char == "+") {
            $this->vitalEnergy += $energy;
        } 
        if ($char == "-") {
            $this->vitalEnergy -= $energy;
        }
        return $this->getVitalEnergy();
    }

}

$animal = new Irbis(80, 2, 'blue', 12, 'male');

var_dump($animal);

var_dump($animal->action('прыгает'));
var_dump($animal->action('sleep'));
var_dump($animal->totalSleepTime);
var_dump($animal->addFood(['fish', 'birds']));
var_dump($animal->eat('fish'));
var_dump($animal->eat('cat'));
var_dump($animal->checkHungry());
var_dump($animal->talk());

var_dump($animal->checkVirus());
var_dump($animal->setVirus(true));
var_dump($animal->checkVirus());

var_dump($animal->action('прыгнул в воду'));
var_dump($animal->getVitalEnergy());
var_dump($animal->action('прыгнул в воду'));
var_dump($animal->getVitalEnergy());
var_dump($animal->action('sleep'));
var_dump($animal->getVitalEnergy());
var_dump($animal->try('поспать на камне'));
var_dump($animal->getVitalEnergy());
var_dump($animal->try('поспать на траве'));
var_dump($animal->eat('fish'));

var_dump($animal);
