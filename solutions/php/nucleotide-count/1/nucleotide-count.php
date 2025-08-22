<?php

function nucleotideCount(string $sequence)
{
    $sequence = strtolower($sequence);
    $nucleotides = [
        'a' => 0,
        'c' => 0,
        't' => 0,
        'g' => 0,
    ];

    foreach ($nucleotides as $nucleotide => $count) {
        $nucleotides[ $nucleotide ] = substr_count($sequence, $nucleotide);
    }

    return $nucleotides;
}
