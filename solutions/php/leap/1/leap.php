<?php

function isLeap($year)
{
    $year = intval($year);

    if ($year % 4 !== 0) {
        return false;
    }

    if ($year % 100 === 0 and $year % 400 !== 0) {
        return false;
    }

    return true;
}
