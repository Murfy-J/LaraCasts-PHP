<?php

namespace Core\middleware;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
        'csrf' => Csrf::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("Middleware key '{$key}' not found");
        }

        (new $middleware)->handle();
    }
}