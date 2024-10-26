<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegistrationFormCopy
{

    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!validator::email($this->attributes['email'])) {
            $this->errors['email'] = "Please enter a valid email address";
        }

        if (!validator::string($this->attributes['password'], 8, 255)) {
            $this->errors['password'] = "Please enter and password with at least 8 characters";
        }

        if (!validator::passwordMatch($this->attributes['password'], $this->attributes['confirmpassword'])) {
            $this->errors['confirmpassword'] = "Passwords do not match!";
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;

    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }


}