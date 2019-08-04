<?php declare(strict_types=1);

namespace Comquer\CompareValues\Conditions;

use Comquer\CompareValues\CompareValues;

class LessThanOrEqualTo extends CompareValues
{
    public function __construct($value)
    {
        parent::__construct(
            $value,
            function ($value) : bool {
                return $value <= $this->value;
            }
        );
    }
}