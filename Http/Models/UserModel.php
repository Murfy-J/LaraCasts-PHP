<?php

namespace Http\Models;

use Core\App;
use Core\Database;

class UserModel
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function findByEmail($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = :email", [':email' => $email])->find();
    }

    public function createUser($attributes)
    {
        $attributes['password'] = password_hash($attributes['password'], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
            ':email' => $attributes['email'],
            ':password' => $attributes['password'],
        ]);

        return $this->findByEmail($attributes['email']);
    }
}
