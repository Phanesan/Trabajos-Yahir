<?php

function separateURL($text, $word) {
    $words = explode($word, $text);
    return $words;
}

function generateToken($long = 32) {
    $universo = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.-,{}()?¿!¡@#$%&';
    $token = '';

    for ($i = 0; $i < $long; $i++) {
        $token .= $universo[rand(0, strlen($universo) - 1)];
    }
    return $token;
}