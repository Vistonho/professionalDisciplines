<?php

include "exceptions/classAException.php";
include "classB.php";

class A
{
    public mixed $userData;
    public function __construct(mixed $userData) {
        $this->userData = $userData;

        try {
            if ($this->userData > 1000) {
                throw new AException('data is big');
            }
        } catch (AException $error) {
            echo($error->myMessage());
        }

        (new B($this->userData));
    }
}