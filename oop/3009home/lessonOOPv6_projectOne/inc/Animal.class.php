<?php

require_once 'Eukaryote.class.php';

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