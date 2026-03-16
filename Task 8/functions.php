<?php

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIS($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}