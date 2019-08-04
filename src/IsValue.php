<?php declare(strict_types=1);

namespace Comquer\Comparator;

use Comquer\Comparator\Conditions\EqualTo;
use Comquer\Comparator\Conditions\EqualToOneOf;
use Comquer\Comparator\Conditions\GreaterThan;
use Comquer\Comparator\Conditions\GreaterThanOrEqualTo;
use Comquer\Comparator\Conditions\LessThan;
use Comquer\Comparator\Conditions\LessThanOrEqualTo;
use Comquer\Comparator\Conditions\NotEqualTo;
use Comquer\Comparator\Conditions\NotSameAs;
use Comquer\Comparator\Conditions\SameAs;

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