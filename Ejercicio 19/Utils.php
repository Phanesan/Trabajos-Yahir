<?php

function separateURL($text, $word) {
    $words = explode($word, $text);
    return $words;
}