<?php declare(strict_types=1);

namespace Comquer\ComparatorTest;

use Comquer\CriteriaEvaluator\IsValue;
use PHPUnit\Framework\TestCase;

class IsValueTest extends TestCase
{
    /** @test */
    function evaluates_equal_to()
    {
        self::assertTrue(IsValue::equalTo(5)(5));
        self::assertFalse(IsValue::equalTo(5)(4));
    }

    /** @test */
    function evaluates_equal_to_one_of()
    {
        self::assertTrue(IsValue::equalToOneOf([1, 2, 3, 4, 5])(5));
        self::assertFalse(IsValue::equalToOneOf([1, 2, 3, 4, 5])(6));
    }

    /** @test */
    function evaluates_greater_than()
    {
        self::assertTrue(IsValue::greaterThan(5)(6));
        self::assertFalse(IsValue::greaterThan(5)(4));
    }

    /** @test */
    function evaluates_greater_than_or_equal_to()
    {
        self::assertTrue(IsValue::greaterThanOrEqualTo(5)(6));
        self::assertTrue(IsValue::greaterThanOrEqualTo(5)(5));
        self::assertFalse(IsValue::greaterThan(5)(4));
    }

    /** @test */
    function evaluates_less_than()
    {
        self::assertTrue(IsValue::lessThan(6)(5));
        self::assertFalse(IsValue::lessThan(5)(6));
    }

    /** @test */
    function evaluates_less_than_or_equal_to()
    {
        self::assertTrue(IsValue::lessThanOrEqualTo(6)(5));
        self::assertTrue(IsValue::lessThanOrEqualTo(5)(5));
        self::assertFalse(IsValue::lessThanOrEqualTo(5)(6));
    }

    /** @test */
    function evaluates_not_equal_to()
    {
        self::assertTrue(IsValue::notEqualTo(6)(5));
        self::assertFalse(IsValue::notEqualTo(5)(5));
    }

    /** @test */
    function evaluates_not_same_as()
    {
        self::assertTrue(IsValue::notSameAs(6)(5));
        self::assertFalse(IsValue::notSameAs(5)(5));
    }

    /** @test */
    function evaluates_same_as_one_of()
    {
        self::assertTrue(IsValue::sameAsOneOf([1, 2, 3])(2));
        self::assertFalse(IsValue::sameAsOneOf([1, 2, 3])(4));
    }
}