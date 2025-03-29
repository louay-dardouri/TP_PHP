<?php

class SessionManager
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['nbVisit'] = 0;
        }
    }

    public function checkSession(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            header('Location /');
            exit();
        }
    }

    public function exist(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return mixed
     */
    public function get(string $key)
    {
        if ($this->exist($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * @param  mixed  $value
     */
    public function set(string $key, $value): SessionManager
    {
        $_SESSION[$key] = $value;

        return $this;
    }

    public function remove(string $key): void
    {
        if ($this->exist($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function reset(): void
    {
        session_unset();
    }

    public function increaseVisits(): void
    {
        $this->checkSession();
        if ($this->exist('nbVisit')) {
            $_SESSION['nbVisit'] += 1;
        } else {
            $_SESSION['nbVisit'] = 1;
        }
    }
}

$s = new SessionManager;
