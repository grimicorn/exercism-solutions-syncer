<?php

//
// This is only a SKELETON file for the "Run Length Encoding" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

function encode($input)
{
    $previousValue = "";
    $count = 1;
    $encoded = "";
    for ($i=0; $i <= strlen($input); $i++) {
        $value = isset($input[$i]) ? $input[$i] :'';
        $count += $value === $previousValue ? 1 : 0;

        if ($previousValue === $value) {
            continue;
        }

        $encoded .= $count === 1 ? $previousValue : "{$count}{$previousValue}";

        $count = 1;
        $previousValue = $value;
    }

    return $encoded;
}

function decode($input)
{
    $input = preg_split('/(?=)([0-9]*[a-zA-Z\\s])/u', $input, null, PREG_SPLIT_DELIM_CAPTURE);
    $input = array_map(function ($value) {
        $count = preg_replace('/[^0-9]/u', ' ', $value);
        $count = trim($count);

        if (!is_numeric($count)) {
            return $value;
        }

        $pad = preg_replace('/[0-9]/u', '', $value);
        return str_pad('', intval($count), $pad);
    }, $input);

    return implode('', $input);
}
