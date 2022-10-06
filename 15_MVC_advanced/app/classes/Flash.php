<?php

namespace app\classes;

class Flash
{
    public static function set($key, $message, $alert = 'danger')
    {
        if(!isset($_SESSION['message'][$key])){
            $_SESSION['message'][$key] = [
                'message' => $message,
                'alert' => $alert
            ];
        }
    }

    public static function get($key)
    {
        if(isset($_SESSION['message'][$key])){
            $flash = $_SESSION['message'][$key];
            unset($_SESSION['message'][$key]);

            return $flash;
        }
    }
}