<?php declare(strict_types=1);

namespace Comquer\CompareValues;

abstract class CompareValues
{
    /** @var mixed */
    protected $value;

    /** @var callable */
    private $evaluateFor;

    public function __construct($value, callable $evaluateFor)
    {
        $this->value = $value;
        $this->evaluateFor = $evaluateFor;
    }

    public function __invoke($value) : bool
    {
        return ($this->evaluateFor)($value);
    }
}