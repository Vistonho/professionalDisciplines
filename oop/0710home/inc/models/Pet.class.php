<?php

class Pet extends Animal implements IRun, ISwimming
{
    const PET_IS_LIVE = true;
    public array $like_foods = [];
    public string $nick_name;
    public $say_sleep;
    
    private $_speed;

    protected $a = 5;

    public function __construct(array $data)
    {
        // $this->nick_name = isset($data['nick_name']) ? $data['nick_name'] : '';
        // $this->color = isset($data['color']) ? $data['color'] : '';
        // $this->count_paw = isset($data['count_paw']) ? $data['count_paw'] : '';

        foreach ($data as $attr => $val) {
            $this->$attr = $val;
        }
    }

    // public function __construct(string $nick_name, string $color, int $count_paw = null)
    // {
    //     $this->nick_name = $nick_name;
    //     parent::__construct($color, $count_paw);
    // }



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
        $this->_speed = $speed;
    }

    /* 
    
    ДОБАВЛЕНО В УРОКЕ 07.10.2023
    
    */

    public function petInfo($data_in = null): string
    {
        // var_dump(get_object_vars($this));

        $s = empty($data_in) ? '<hr>' : '';
        $mas = $data_in ?? get_object_vars($this);
        ksort($mas);


        foreach($mas as $attr => $val)
        {
            if (!is_array($val)) {

                if(is_bool($val)) {
                    $val = $val ? 'yes' : 'no';
                }

                if (is_string($val) && strpos($val, 'protected') !== false) 
                {  
                    continue;
                }

                $s .= "<div>"
                . (empty($data_in) ? "$attr: " : " - ")
                . $val
                . "</div>"; 
            } else {
                //array
                $s .= "<div>$attr: "
                    . $this->petInfo($val)
                    . "</div>"; 
            }
        }
        $s .= empty($data_in) ? '<hr>' : '';
        return $s;
        // $s = "<div>like_foods: ";
        // foreach($this->like_foods as $value) 
        // {
        //     $s .= "<div> " . $value . "</div>";
        // }
        // $s .= "</div>";

        // return 
        //     "<br><div>|ПИТОМЕЦ О СЕБЕ|</div>"
        //     . "<div>count_paw: " . $this->count_paw . "</div>"
        //     . "<div>nickname: " . $this->nick_name . "</div>"
        //     . "<div>hungry: " . ($this->count_paw ? 'Да' : 'Нет') . "</div>"
        //     . "<div>color: " . $this->color . "</div>"
        //     . "<div>count_paw: " . $this->count_paw . "</div>"
        //     . $s
        //     . "<div>say_sleep: " . $this->say_sleep . "</div><br>";
    }

}
