<?php

class Auth {
    private $users = [];

    public function __construct(string $userFilePath) {
        if (!file_exists($userFilePath)) {
            throw new Exception("User file not found.");
        }

        $json = file_get_contents($userFilePath);
        $this->users = json_decode($json, true);
    }

    public function attempt(string $username, string $password): bool {
        foreach ($this->users as $user) {
            if ($user['username'] === $username && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $username;
                return true;
            }
        }
        return false;
    }

    public function check(): bool {
        return isset($_SESSION['user']);
    }

    public function user(): ?string {
        return $_SESSION['user'] ?? null;
    }

    public function logout(): void {
        unset($_SESSION['user']);
    }
}
