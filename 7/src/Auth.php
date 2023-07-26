<?php

class Auth
{
    public function getUsersList(): array
    {
        // password - 123
        return [
            'test' => [
                'login' => 'test',
                'password_hash' => '$2y$10$J0GTM.AsRTeox1Bu5JyvT.0L0iJKdQS21RaLYY/WyvdbL9jQSYJnC',
                'name' => 'Тестовый',
            ],
            'test2' => [
                'login' => 'test2',
                'password_hash' => '$2y$10$J0GTM.AsRTeox1Bu5JyvT.0L0iJKdQS21RaLYY/WyvdbL9jQSYJnC',
            ],
        ];
    }

    public function existsUser(string $login): bool
    {
        return key_exists($login, $this->getUsersList());
    }

    public function checkPassword(string $login, string $password): bool
    {
        $isVerificationPassed = false;

        if ($this->existsUser($login)) {
            $isVerificationPassed = password_verify($password, $this->getUsersList()[$login]['password_hash']);
        }

        return $isVerificationPassed;
    }

    public function setCurrentUser(string $login): void
    {
        if ($this->existsUser($login) && isset($_SESSION)) {
            $_SESSION['USER'] = $this->getUsersList()[$login];
        }
    }

    public function getCurrentUser(): mixed
    {
        $userData = null;

        if (isset($_SESSION['USER'])) {
            $userData = $_SESSION['USER'];
        }

        return $userData;
    }
}