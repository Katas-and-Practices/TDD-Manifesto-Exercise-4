<?php

declare(strict_types=1);

namespace Exercise4\Tests\Unit;

require_once 'src/Searcher.php';

use Exercise4\Searcher;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    public Searcher $searcher;

    public function setUp(): void
    {
        $this->searcher = new Searcher();
    }

    /**
     * @dataProvider shouldReturnEmptyWhenInputLongerThanAnyCityNameDataProvider
     */
    public function testShouldReturnEmptyWhenInputLessThanTwoCharacters(): void
    {
        $result = $this->searcher->search('a');

        $this->assertSame([], $result);
    }

    /**
     * @dataProvider shouldReturnCitiesStartingWithInputGivenAtLeastTwoCharactersDataProvider
     */
    public function testShouldReturnCitiesStartingWithInputGivenAtLeastTwoCharacters(string $testcase, array $expected): void
    {
        $result = $this->searcher->search($testcase);

        $this->assertSame($expected, $result);
    }

    /**
     * @dataProvider shouldReturnCitiesStartingWithCaseInsensitiveInputGivenAtLeastTwoCharactersDataProvider
     */
    public function testShouldReturnCitiesStartingWithCaseInsensitiveInputGivenAtLeastTwoCharacters(string $testcase, array $expected): void
    {
        $result = $this->searcher->search($testcase);

        $this->assertSame($expected, $result);
    }

    /**
     * @dataProvider shouldReturnCitiesContainingCaseInsensitiveInputGivenAtLeastTwoCharactersDataProvider
     */
    public function testShouldReturnCitiesContainingCaseInsensitiveInputGivenAtLeastTwoCharacters(string $testcase, array $expected): void
    {
        $result = $this->searcher->search($testcase);

        $this->assertSame($expected, $result);
    }

    public static function shouldReturnEmptyWhenInputLongerThanAnyCityNameDataProvider()
    {
        return [
            ['Pariss', []],
            ['Istanbull', []],
            ['SydneyY', []],
        ];
    }

    public static function shouldReturnCitiesStartingWithInputGivenAtLeastTwoCharactersDataProvider(): array
    {
        return [
            ['Pa', ['Paris']],
            ['Par', ['Paris']],
            ['Paris', ['Paris']],
            ['Va', ['Valencia', 'Vancouver']],
            ['Van', ['Vancouver']],
        ];
    }

    public static function shouldReturnCitiesStartingWithCaseInsensitiveInputGivenAtLeastTwoCharactersDataProvider(): array
    {
        return [
            ['pA', ['Paris']],
            ['PAR', ['Paris']],
            ['parIS', ['Paris']],
            ['va', ['Valencia', 'Vancouver']],
            ['van', ['Vancouver']],
        ];
    }

    public static function shouldReturnCitiesContainingCaseInsensitiveInputGivenAtLeastTwoCharactersDataProvider(): array
    {
        return [
            ['ri', ['Paris']],
            ['riS', ['Paris']],
            ['ARI', ['Paris']],
            ['ams', ['Amsterdam']],
            ['ne', ['Sydney', 'New York City']],
            ['ON', ['London', 'Hong Kong']],
            ['LondonDDd', []],
            ['bA', ['Bangkok', 'Dubai']],
            ['bAii', []],
            ['an', ['Vancouver', 'Bangkok', 'Istanbul']],
            ['is', ['Paris', 'Istanbul']],
            ['TEr', ['Rotterdam', 'Amsterdam']],
        ];
    }
}
