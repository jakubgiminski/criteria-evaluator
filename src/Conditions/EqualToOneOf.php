<?php declare(strict_types=1);

namespace Comquer\CompareValues\Conditions;

use Comquer\CompareValues\CompareValues;

class EqualToOneOf extends CompareValues
{
    public function __construct($value)
    {
        parent::__construct(
            $value,
            function ($value) : bool {
                $isValueEqualTo = new EqualTo($value);
                foreach ($this->value as $value) {
                    if ($isValueEqualTo($value)) {
                        return true;
                    }
                }
                return false;
            }
        );
    }
}