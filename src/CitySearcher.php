<?php

declare(strict_types=1);

namespace Exercise4;

require_once 'search/StringSearchPerformer.php';

use Exercise4\Search\StringSearchPerformer;

class CitySearcher
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

    public function __construct(
        private StringSearchPerformer $searchPerformer,
    )
    {}

    public function search(string $input): array
    {
        return $this->searchPerformer->perform(static::$cities, $input);
    }
}
