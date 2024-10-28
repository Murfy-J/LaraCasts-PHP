<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends BaseForm
{
    public function validateAttributes(): void
    {
        if (!Validator::email($this->attributes['email'])) {
            $this->error('email', "Please enter a valid email address");
        }

        if (!Validator::string($this->attributes['password'], 8, 255)) {
            $this->error('password', "Please enter a password with at least 8 characters");
        }

        if (!Validator::passwordMatch($this->attributes['password'], $this->attributes['confirmpassword'] ?? '')) {
            $this->error('confirmpassword', "Passwords do not match!");
        }
    }
}
