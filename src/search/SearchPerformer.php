<?php

namespace Exercise4\Search;

interface SearchPerformer
{
    public function perform(array $subjects, string $input): array;
}