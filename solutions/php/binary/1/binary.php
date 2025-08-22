<?php

// Implementation note:
// --------------------
// If the argument to parse_binary isn't a valid binary value the
// function should raise an \InvalidArgumentException
// with a meaningful error message.

function parse_binary(string $binary)
{
    if (!valid_binary($binary)) {
        throw new InvalidArgumentException("String {$binary} is not valid binary.");
    }

    $exponent = 0;

    $digits = array_reverse(str_split($binary));
    $digits = array_map(function ($digit) use (&$exponent) {
        $digit = $digit * pow(2, $exponent);
        $exponent += 1;

        return $digit;
    }, array_values($digits));

    return array_sum($digits);
}

function valid_binary(string $binary)
{
    return $binary === preg_replace('/[^01]/u', '', $binary);
}
