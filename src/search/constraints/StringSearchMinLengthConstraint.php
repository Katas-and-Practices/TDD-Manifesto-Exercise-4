<?php

namespace Exercise4\Search\Constraints;

require_once 'StringSearchConstraint.php';

class StringSearchMinLengthConstraint implements StringSearchConstraint
{
    public function __construct(
        private int $minLength = 0,
    ) {}

    public function check(string $input): bool
    {
        return strlen($input) >= $this->minLength;
    }
}