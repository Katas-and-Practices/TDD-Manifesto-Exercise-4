<?php

declare(strict_types=1);

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
            $match = false;

            for ($i = 0; $i < strlen($city) - strlen(($input)) + 1; $i++) {
                for ($j = 0, $tempCityIndex = 0; $j < strlen($input); $j++, $tempCityIndex++) {
                    if (strtolower($city[$i + $tempCityIndex]) !== strtolower($input[$j])) {
                        break;
                    }
                }

                if ($j === strlen($input)) {
                    $match = true;
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
