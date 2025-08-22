<?php

function flatten($values)
{
    $output = [];
    foreach ($values as $value) {
        if (is_array($value)) {
            $output = array_merge($output, flatten($value));
            continue;
        }

        $output[] = $value;
    }

    return array_values(array_filter($output, function ($item) {
        return !is_null($item);
    }));
}
