<?php

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