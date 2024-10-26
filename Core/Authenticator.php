<?php

namespace Core;

class Authenticator
{

    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'id' => $user['id']
                ]);

                return true;
            }
        }

        return false;
    }

    public static function login(array $user): void
    {

        $_SESSION['user'] = [
            'email' => $user['email'],
            'currentUserId' => $user['id'],
        ];

        $_SESSION['csrf_token'] = [];
        (new User)->newCsrfToken();


        session_regenerate_id(true);
    }

    public function logout(): void
    {
        Session::destroy();

    }
}