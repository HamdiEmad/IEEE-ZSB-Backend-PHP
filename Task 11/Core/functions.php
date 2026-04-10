<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIS($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/" . $path);
}

function abort($status = Response::FORBIDDEN)
{
    http_response_code($status);
    require base_path("views/{$status}.php");
    die();
}

function redirect($path)
{
    header("Location: {$path}");
    exit();
}

function old($key, $default = null)
{
    return Core\Session::get('old')[$key] ?? $default;
}
