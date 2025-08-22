<?php

//
// This is only a SKELETON file for the "Hamming" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

function distance($a, $b)
{
    $distance = 0;

    if (strlen($a) !== strlen($b)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }

    for ($i=0; $i < strlen($a); $i++) {
        $distance += ($a[$i] === $b[$i]) ? 0 : 1;
    }

    return $distance;
}
