<?php

namespace Exercise4\Search;

use Exercise4\Search\MatchAlgorithms\StringMatchAlgorithm;
use Exercise4\Search\MatchAlgorithms\StringMatchCaseInsensitiveAlgorithm;

require_once 'StringSearchPerformer.php';
require_once 'constraints/StringSearchMinLengthConstraint.php';
require_once 'match-algorithms/StringMatchCaseInsensitiveAlgorithm.php';

class SimpleStringSearchPerformer extends StringSearchPerformer
{
    public function __construct(
        protected StringMatchAlgorithm $matchAlgorithm = new StringMatchCaseInsensitiveAlgorithm(),
        protected array $constraints = [],
    ) {
        parent::__construct($matchAlgorithm, $this->constraints);
    }
}
