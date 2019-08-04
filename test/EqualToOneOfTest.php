<?php declare(strict_types=1);

namespace Comquer\ComparatorTest;

use Comquer\CriteriaEvaluator\Criteria\EqualToOneOf;
use PHPUnit\Framework\TestCase;

class EqualToOneOfTest extends TestCase
{
    /** @test */
    function evaluation()
    {
        $isValueEqualToOneOfTheElements = new EqualToOneOf([1, 2, 3]);
        self::assertTrue($isValueEqualToOneOfTheElements(2));
        self::assertFalse($isValueEqualToOneOfTheElements(4));
    }

    /** @test */
    function serialization()
    {
        $isValueEqualToOneOfTheElements = new EqualToOneOf([1, 2, 3]);

        self::assertEquals(
            $isValueEqualToOneOfTheElements,
            EqualToOneOf::deserialize($isValueEqualToOneOfTheElements->serialize())
        );
    }
}