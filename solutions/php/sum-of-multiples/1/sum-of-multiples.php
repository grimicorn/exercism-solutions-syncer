<?php

function sumOfMultiples($max, $multiples)
{
    $toSum = [];

    $multiples = array_filter($multiples, function ($multiple) use ($max) {
        return intval($multiple) > 0 and $multiple < $max;
    });

    foreach ($multiples as $multiple) {
        $current = 0;
        $multiplier = 1;
        while ($current < $max) {
            $current = $multiple * $multiplier;
            $toSum[] =  $current >= $max ? 0 : $current;
            $multiplier++;
        }
    }

    return array_sum(array_unique($toSum));
}
