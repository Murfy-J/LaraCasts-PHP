<?php

declare(strict_types=1);

namespace Core;

use Exception;

class Container
{
    protected array $bindings = [];

    public function bind($key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key): mixed
    {

        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("Could not resolve key: {$key}");
        }
        if (array_key_exists($key, $this->bindings)) {
            $resolver = $this->bindings[$key];
            return call_user_func($resolver);
        }

    }
}