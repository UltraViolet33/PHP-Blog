<?php

namespace App\helpers;

class Session
{

    public static function init(): void
    {
        session_start();
    }


    public static function set(string $key, string|array $value): void
    {
        $_SESSION[$key] = $value;
    }


    public static function get(string|array $key): string|array|bool
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }


    public static function unsetKey(string $key): bool
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
}
