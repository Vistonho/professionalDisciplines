<?php

class Cookie
{
    public function set(string $name, string $value, int $expires) 
    {
        setcookie($name, $value, $expires);
    }

    public function get(string $name)
    {
        return (isset($_COOKIE[$name]) ? $_COOKIE["$name"] : "Cookie не найдена!" );
    }

    public function del(string $name)
    {
        setcookie($name, '', time() - 3600);
    }
}

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set(string $name, string $value) 
    {
        $_SESSION[$name] = $value;
    }

    public function get(string $name)
    {
        return $_SESSION[$name];
    }

    public function del(string $name)
    {
        unset($_SESSION[$name]);
    }

    public function check(string $name)
    {
        return (isset($_SESSION[$name]) ? true : false );
    }
}

class Flash
{
    public function setMessage(string $name, string $message)
    {
        return (new Session)->set($name, $message); //или переписать как статик? 
    }

    public function getMessage(string $name)
    {
        if ((new Session)->check($name))
        {
            return (new Session)->get($name);
        }
    }
}