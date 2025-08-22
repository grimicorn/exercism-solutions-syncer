<?php

function calculate($input)
{
    $input = strtolower($input);
    $input = str_replace('plus', '+', $input);
    $input = str_replace('minus', '-', $input);
    $input = str_replace('multiplied', '*', $input);
    $input = str_replace('divided', '/', $input);
    $input = trim($input);
    $operation = preg_replace('/[^\s-+\/*0-9]/u', '', $input);

    $check = preg_replace('/ /u', '', $operation);
    $invalid = $check === preg_replace('/[-+*\/]/u', '', $check);
    if ($invalid) {
        throw new InvalidArgumentException;
    }

    $operation = array_map(function ($value) {
        return '(' . trim($value) . ')';
    }, explode(' * ', $operation));
    $operation = implode(' * ', $operation);

    return eval("return ($operation);");
}
