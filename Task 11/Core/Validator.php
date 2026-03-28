<?php

namespace Core;

class Validator {
    public static function string($value, $min = 1, $max = INF) {
        $value = trim($value);
        return $value <= $max && $value >= $min;
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}