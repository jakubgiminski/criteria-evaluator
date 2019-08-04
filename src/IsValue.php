<?php declare(strict_types=1);

namespace Comquer\CompareValues;

use Comquer\CompareValues\Conditions\EqualTo;
use Comquer\CompareValues\Conditions\EqualToOneOf;
use Comquer\CompareValues\Conditions\GreaterThan;
use Comquer\CompareValues\Conditions\GreaterThanOrEqualTo;
use Comquer\CompareValues\Conditions\LessThan;
use Comquer\CompareValues\Conditions\LessThanOrEqualTo;
use Comquer\CompareValues\Conditions\NotEqualTo;
use Comquer\CompareValues\Conditions\NotSameAs;
use Comquer\CompareValues\Conditions\SameAs;

class IsValue
{
    private function __construct() {}

    public static function greaterThan($value) : callable
    {
        return new GreaterThan($value);
    }

    public static function greaterThanOrEqualTo($value) : callable
    {
        return new GreaterThanOrEqualTo($value);
    }

    public static function atLeast($value) : callable
    {
        return self::greaterThanOrEqualTo($value);
    }

    public static function lessThan($value) : callable
    {
        return new LessThan($value);
    }

    public static function lessThanOrEqualTo($value) : callable
    {
        return new LessThanOrEqualTo($value);
    }

    public static function atMost($value) : callable
    {
        return self::lessThanOrEqualTo($value);
    }

    public static function equalTo($value) : callable
    {
        return new EqualTo($value);
    }

    public static function notEqualTo($value) : callable
    {
        return new NotEqualTo($value);
    }

    public static function sameAs($value) : callable
    {
        return new SameAs($value);
    }

    public static function notSameAs($value) : callable
    {
        return new NotSameAs($value);
    }

    public static function equalToOneOf(iterable $values) : callable
    {
        return new EqualToOneOf($values);
    }

    public static function sameAsOneOf(iterable $values) : callable
    {
        return new EqualToOneOf($values);
    }
}