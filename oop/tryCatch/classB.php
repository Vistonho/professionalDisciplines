<?php

include "exceptions/classCException.php";
include "classC.php";

class B
{
    public mixed $userData;
    public function __construct(mixed $userData) {
        $this->userData = $userData;

        try {
            if ($this->userData > 1000) {
                throw new BException('data is big');
            }
        } catch (BException $error) {
            echo($error->myMessage());
        }

        (new B)($this->userData);
    }
}