<?php

function accumulate(array $input, callable $accumulator)
{
    foreach ($input as &$value) {
        $value = call_user_func($accumulator, $value);
    }

    return $input;
}
