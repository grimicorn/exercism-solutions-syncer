<?php

function toRna($dna)
{
    $parts = str_split($dna);
    $rna = array_map(function ($value) {
        $lookup = [
          'G' => 'C',
          'C' => 'G',
          'T' => 'A',
          'A' => 'U',
        ];

        if (isset($lookup[$value])) {
            return $lookup[$value];
        }

        return $value;
    }, $parts);

    return implode('', $rna);
}
