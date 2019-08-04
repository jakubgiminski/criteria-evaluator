<?php declare(strict_types=1);

namespace Comquer\ComparatorTest;

use Comquer\CriteriaEvaluator\Criteria\LessThan;
use PHPUnit\Framework\TestCase;

class LessThanTest extends TestCase
{
    /** @test */
    function evaluation()
    {
        $isValueLessThanFive = new LessThan(5);
        self::assertTrue($isValueLessThanFive(4));
        self::assertFalse($isValueLessThanFive(6));
    }

    /** @test */
    function serialization()
    {
        $isValueLessThanFive = new LessThan(5);
        self::assertEquals(
            $isValueLessThanFive,
            LessThan::deserialize($isValueLessThanFive->serialize())
        );
    }
}