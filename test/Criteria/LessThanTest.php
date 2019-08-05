<?php declare(strict_types=1);

namespace Comquer\ComparatorTest\Criteria;

use Comquer\CriteriaEvaluator\Criteria\LessThan;
use Comquer\CriteriaEvaluator\Criterion\CriterionClassNameProvider;
use Comquer\CriteriaEvaluator\Criterion\CriterionFactory;
use PHPUnit\Framework\TestCase;

class LessThanTest extends TestCase
{
    /** @test */
    function evaluate()
    {
        $isValueLessThanFive = new LessThan(5);
        self::assertTrue($isValueLessThanFive(4));
        self::assertFalse($isValueLessThanFive(6));
    }

    /** @test */
    function serialize_and_deserialize_explicitly()
    {
        $isValueLessThanFive = new LessThan(5);

        self::assertEquals(
            $isValueLessThanFive,
            LessThan::deserialize($isValueLessThanFive->serialize())
        );
    }

    /** @test */
    function serialize_and_deserialize_with_a_factory()
    {
        $isValueLessThanFive = new LessThan(5);
        $criterionFactory = new CriterionFactory(new CriterionClassNameProvider());
        $serializedCriterion = $isValueLessThanFive->serialize();

        self::assertEquals(
            $isValueLessThanFive,
            $criterionFactory->createFromSerialized($serializedCriterion)
        );
    }
}