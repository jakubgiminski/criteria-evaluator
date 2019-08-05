<?php declare(strict_types=1);

namespace Comquer\ComparatorTest\Criteria;

use Comquer\CriteriaEvaluator\Criteria\LessThanOrEqualTo;
use PHPUnit\Framework\TestCase;

class LessThanOrEqualToTest extends TestCase
{
    /** @test */
    function evaluation()
    {
        $isValueLessThanOrEqualToFive = new LessThanOrEqualTo(5);
        self::assertTrue($isValueLessThanOrEqualToFive(4));
        self::assertTrue($isValueLessThanOrEqualToFive(5));
        self::assertFalse($isValueLessThanOrEqualToFive(6));
    }

    /** @test */
    function serialization()
    {
        $isValueLessThanOrEqualToFive = new LessThanOrEqualTo(5);
        self::assertEquals(
            $isValueLessThanOrEqualToFive,
            LessThanOrEqualTo::deserialize($isValueLessThanOrEqualToFive->serialize())
        );
    }
}