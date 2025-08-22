<?php

function squareOfSum($end)
{
    $values = range(1, $end);
    $sum = array_sum($values);

    return pow($sum, 2);
}

function sumOfSquares($end)
{
    $values = array_map(function ($value) {
        return pow($value, 2);
    }, range(1, $end));

    return array_sum($values);
}

function difference($end)
{
    return squareOfSum($end) - sumOfSquares($end);
}
