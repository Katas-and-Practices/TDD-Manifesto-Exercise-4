<?php

namespace Exercise4\Search;

use Exercise4\Search\MatchAlgorithms\StringMatchAlgorithm;

require_once 'match-algorithms/StringMatchAlgorithm.php';

class StringSearchPerformer
{
    public function __construct(
        protected StringMatchAlgorithm $matchAlgorithm,
        protected array $constraints = [],
    ) {}

    public function perform(array $subjects, string $input): array
    {
        if (!$this->checkConstraints($input)) {
            return [];
        }

        $matches = $this->getMatchesOfInputInSubjects($subjects, $input);

        return $matches;
    }

    private function checkConstraints(string $input): bool
    {
        $passed = true;

        foreach ($this->constraints as $constraint) {
            $passed = $passed && $constraint->check($input);
        }

        return $passed;
    }

    private function getMatchesOfInputInSubjects(array $subjects, string $input): array
    {
        $matches = [];

        foreach ($subjects as $subject) {
            $hasMatched = $this->matchAlgorithm->run($subject, $input);

            if ($hasMatched) {
                $matches[] = $subject;
            }
        }

        return $matches;
    }
}