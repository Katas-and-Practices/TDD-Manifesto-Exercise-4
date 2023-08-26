<?php

declare(strict_types=1);

namespace Exercise4\Tests\Unit;

require_once 'src/Searcher.php';

use Exercise4\Searcher;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    public function testShouldReturnEmptyWhenInputLessThanTwoCharacters(): void
    {
        $searcher = new Searcher();

        $result = $searcher->search('a');

        $this->assertSame([], $result);
    }

    public function testShouldReturnCitiesStartingWithInputGivenAtLeastTwoCharacters(): void
    {
        $searcher = new Searcher();

        $result = $searcher->search('Par');

        $this->assertSame(['Paris'], $result);
    }
}
