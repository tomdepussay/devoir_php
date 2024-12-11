<?php

namespace App\Core;

class User
{

    public function login(array $userData): void
    {
        $_SESSION['user'] = $userData;
    }

    public function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}
