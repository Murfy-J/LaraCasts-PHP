<?php

declare(strict_types=1);

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 1, int $max = PHP_INT_MAX): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;

    }


    public static function email(string $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function passwordMatch(string $password, string $confirmPassword): bool
    {
        return $password === $confirmPassword;
    }
}



