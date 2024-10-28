<?php

declare(strict_types=1);

use Core\Response;

function abort($code = 404): void
{
    http_response_code($code);

    require base_path("views/{$code}.view.php");

    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

//    die();
}

function authorize(bool $condition, int $status = Response::FORBIDDEN): void
{
    if (!$condition) {

        abort($status);
    }
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}


function redirect(string $path)
{
    header("Location: {$path}");
    exit();
}

function old(string $key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}