<?php declare(strict_types=1);

namespace Comquer\ComparatorTest;

use Comquer\CriteriaEvaluator\Criteria\GreaterThanOrEqualTo;
use PHPUnit\Framework\TestCase;

class GreaterThanOrEqualToTest extends TestCase
{
    /** @test */
    function evaluation()
    {
        $isValueGreaterThanOrEqualToFive = new GreaterThanOrEqualTo(5);
        self::assertTrue($isValueGreaterThanOrEqualToFive(6));
        self::assertTrue($isValueGreaterThanOrEqualToFive(5));
        self::assertFalse($isValueGreaterThanOrEqualToFive(4));
    }

    /** @test */
    function serialization()
    {
        $isValueGreaterThanOrEqualToFive = new GreaterThanOrEqualTo(5);
        self::assertEquals(
            $isValueGreaterThanOrEqualToFive,
            GreaterThanOrEqualTo::deserialize($isValueGreaterThanOrEqualToFive->serialize())
        );
    }
}