<?php

class SessionManager
{
    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function checkSession(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            header('Location /');
            exit();
        }
    }

    public static function exist(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return mixed
     */
    public static function get(string $key)
    {
        if (self::exist($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * @param  mixed  $value
     */
    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function remove(string $key): void
    {
        if (self::exist($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function reset(): void
    {
        session_unset();
    }

    public static function increaseVisits(): void
    {
        self::checkSession();
        if (self::exist('nbVisit')) {
            $_SESSION['nbVisit'] += 1;
        } else {
            $_SESSION['nbVisit'] = 1;
        }
    }
}
