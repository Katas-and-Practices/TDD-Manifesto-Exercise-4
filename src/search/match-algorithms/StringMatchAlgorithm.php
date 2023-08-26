<?php

namespace Exercise4\Search\MatchAlgorithms;

interface StringMatchAlgorithm
{
    public function run(string $subject, string $input): bool;
}