<?php declare(strict_types=1);

namespace Comquer\CompareValuesTest;

use Comquer\CompareValues\IsValue;
use PHPUnit\Framework\TestCase;

class IsValueTest extends TestCase
{
    /** @test */
    function evaluates_greater_than()
    {
        self::assertTrue(IsValue::greaterThan(5)(6));
        self::assertFalse(IsValue::greaterThan(5)(4));
    }
}