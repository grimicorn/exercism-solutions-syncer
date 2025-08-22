<?php

function toDecimal($trinary)
{
    $invalidRemoved = preg_replace('/[^0-2]/u', '', $trinary);
    if ($invalidRemoved !== $trinary) {
        $trinary = '0';
    }

    $values = str_split($trinary);
    $keys = array_reverse(array_keys($values));
    $values = array_combine($keys, $values);
    $values = array_map(function ($value, $key) {
        return intval($value) * pow(3, intval($key));
    }, $values, array_keys($values));

    return array_sum($values);
}
