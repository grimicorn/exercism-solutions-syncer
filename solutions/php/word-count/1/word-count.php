<?php

function wordCount($words)
{
    $counts = [];
    $words = strtolower($words);
    $words = preg_replace('/\\n+/u', ' ', $words); // Remove newlines
    $words = preg_replace('/[^\w]/u', ' ', $words); // Remove non-alphanumeric
    $words = explode(' ', $words);

    foreach ($words as $word) {
        $word = trim($word);
        if (!$word) {
            continue;
        }

        $count = 1;
        if (isset($counts[$word])) {
            $count += $counts[$word];
        }

        $counts[$word] = $count;
    }

    return $counts;
}
