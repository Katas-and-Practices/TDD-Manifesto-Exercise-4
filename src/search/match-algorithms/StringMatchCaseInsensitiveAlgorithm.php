<?php

namespace Exercise4\Search\MatchAlgorithms;

require_once 'StringMatchAlgorithm.php';

class StringMatchCaseInsensitiveAlgorithm implements StringMatchAlgorithm
{
    public function run(string $subject, string $search): bool
    {
        for ($i = 0; $i < strlen($subject) - strlen(($search)) + 1; $i++) {
            for ($j = 0, $tempSubjectIndex = 0; $j < strlen($search); $j++, $tempSubjectIndex++) {
                if (strtolower($subject[$i + $tempSubjectIndex]) !== strtolower($search[$j])) {
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