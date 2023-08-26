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
        if (strlen($input) < 2) {
            return [];
        }

        $cities = [];

        foreach (static::$cities as $city) {
            $match = true;

            for ($i = 0; $match && $i < strlen($input); $i++) {
                if (strtolower($city[$i]) !== strtolower($input[$i])) {
                    $match = false;
                }
            }

            if ($match) {
                $cities[] = $city;
            }
        }

        return $cities;
    }
}
