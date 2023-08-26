<?php

namespace Exercise4\Search\Constraints;

interface StringSearchConstraint
{
    public function check(string $input): bool;
}