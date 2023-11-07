<?php

//Integer
class BException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function myMessage()
    {
        return "<span style='background-color: blue; color: white;'>B_EXCEP ". $this->getMessage() ."</span>";
    }
}