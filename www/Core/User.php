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

    public function getUser(): array
    {
        return $_SESSION['user'];
    }

    public function getFirstname(): string
    {
        return $_SESSION['user']['firstname'];
    }

    public function getLastname(): string
    {
        return $_SESSION['user']['lastname'];
    }

    public function getEmail(): string
    {
        return $_SESSION['user']['email'];
    }

    public function getCountry(): string
    {
        return $_SESSION['user']['country'];
    }
}
