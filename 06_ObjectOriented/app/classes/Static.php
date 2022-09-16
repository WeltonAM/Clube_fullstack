<?php

namespace app\classes;

abstract class Email
{
    public static function as()
    {
        return 'As';
    }

    public static function who()
    {
        return 'Juliana';
    }

    public static function send()
    {
        return self::who(); // static::who();
    }
}

class SendEmail extends Email
{
    public function __construct()
    {
        parent::as(); // static
    }

    public static function who()
    {
        return "Karla"; // static
    }
}

echo SendEmail::send();