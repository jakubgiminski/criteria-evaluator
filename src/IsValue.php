<?php declare(strict_types=1);

namespace Comquer\CompareValues;

class IsValue
{
    private function __construct() {}

    public static function greaterThan($value) : GreaterThan
    {
        return new GreaterThan($value);
    }
}