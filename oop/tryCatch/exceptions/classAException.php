<?php

//Integer
class AException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function myMessage()
    {
        return "<span style='background-color: black; color: white;'>A_EXCEP " . $this->getMessage() ."</span>";
    }
}