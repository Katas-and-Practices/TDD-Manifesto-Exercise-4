<?php

namespace Exercise4;

class Searcher
{
    private static $cities = [
        'Paris',
        'Budapest',
        'Skopje',
        'Rotterdam',
        'Valencia',
        'Vancouver',
        'Amsterdam',
        'Vienna',
        'Sydney',
        'New York City',
        'London',
        'Bangkok',
        'Hong Kong',
        'Dubai',
        'Rome',
        'Istanbul'
    ];

    public function search(string $input): array
    {
        $cities = [];

        $match = true;

        foreach (static::$cities as $city) {
            for ($i = 0; $i < strlen($input); $i++) {
                if ($city[$i] !== $input[$i]) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                $cities[] = $city;
            }
        }

        return $cities;
    }
}