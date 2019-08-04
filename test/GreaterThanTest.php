<?php declare(strict_types=1);

namespace Comquer\ComparatorTest;

use Comquer\CriteriaEvaluator\Criteria\GreaterThan;
use PHPUnit\Framework\TestCase;

class GreaterThanTest extends TestCase
{
    /** @test */
    function evaluation()
    {
        $isValueGreaterThanFive = new GreaterThan(5);
        self::assertTrue($isValueGreaterThanFive(6));
        self::assertFalse($isValueGreaterThanFive(5));
    }

    /** @test */
    function serialization()
    {
        $isValueGreaterThanFive = new GreaterThan(5);
        self::assertEquals(
            $isValueGreaterThanFive,
            GreaterThan::deserialize($isValueGreaterThanFive->serialize())
        );
    }
}