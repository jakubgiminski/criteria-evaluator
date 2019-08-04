<?php declare(strict_types=1);

namespace Comquer\CompareValues;

abstract class CompareValues
{
    protected $value;

    private $compare;

    public function __construct($value, callable $compare)
    {
        $this->value = $value;
        $this->compare = $compare;
    }

    public function __invoke($value) : bool
    {
        return (bool)($this->compare)($value);
    }
}