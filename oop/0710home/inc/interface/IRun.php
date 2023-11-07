<?php

interface IRun 
{
    //если животное умеет бегать, то будьте добры указать скорость его бега
    public function setSpeed(float $speed): void; //abstract method
}