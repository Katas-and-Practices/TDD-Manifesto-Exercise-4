<?php

namespace Exercise4\Search;

require_once 'SearchPerformer.php';

class SimpleSearchPerformer implements SearchPerformer
{
    public function perform(array $subjects, string $input): array
    {
        if (strlen($input) < 2) {
            return [];
        }

        $cities = [];

        foreach ($subjects as $city) {
            $match = $this->firstStringContainsSecondCaseInsensitive($city, $input);

            if ($match) {
                $cities[] = $city;
            }
        }

        return $cities;
    }

    private function firstStringContainsSecondCaseInsensitive(string $subject, string $search): bool
    {
        for ($i = 0; $i < strlen($subject) - strlen(($search)) + 1; $i++) {
            for ($j = 0, $tempCityIndex = 0; $j < strlen($search); $j++, $tempCityIndex++) {
                if (strtolower($subject[$i + $tempCityIndex]) !== strtolower($search[$j])) {
                    break;
                }
            }

            if ($j === strlen($search)) {
                return true;
            }
        }

        return false;
    }
}