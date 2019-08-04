<?php declare(strict_types=1);

namespace Comquer\ComparatorTest;

use Comquer\CriteriaEvaluator\Criteria\EqualTo;
use PHPUnit\Framework\TestCase;

class EqualToTest extends TestCase
{
    /** @test */
    function evaluation()
    {
        $isValueEqualToFive = new EqualTo(5);
        self::assertTrue($isValueEqualToFive(5));
        self::assertFalse($isValueEqualToFive(4));
    }

    /** @test */
    function serialization()
    {
        $isValueEqualToFive = new EqualTo(5);
        self::assertEquals(
            $isValueEqualToFive,
            EqualTo::deserialize($isValueEqualToFive->serialize())
        );
    }
}