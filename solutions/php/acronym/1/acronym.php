<?php

function acronym($input)
{
    $input = preg_replace('/([a-z])([A-Z])/u', '$1 $2', $input);
    $input = str_replace('-', ' ', $input);
    $words = explode(' ', $input);

    if (count($words) === 1) {
        return '';
    }

    $firstLetters = array_map(function ($word) {
        return mb_substr($word, 0, 1);
    }, $words);
    $firstLetters = array_filter($firstLetters);

    $acronym = implode('', $firstLetters);
    $acronym = mb_strtoupper($acronym);

    return $acronym;
}
