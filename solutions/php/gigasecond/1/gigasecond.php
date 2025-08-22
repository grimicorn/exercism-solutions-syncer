<?php

function from($date)
{
    $gigasecond = 1000000000;
    $time = (int) $date->format('U') + $gigasecond;

    return DateTime::createFromFormat('U', $time);
}
