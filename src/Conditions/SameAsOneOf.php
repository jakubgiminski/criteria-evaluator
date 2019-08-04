<?php declare(strict_types=1);

namespace Comquer\CompareValues\Conditions;

use Comquer\CompareValues\CompareValues;

class SameAsOneOf extends CompareValues
{
    public function __construct($value)
    {
        parent::__construct(
            $value,
            function ($value) : bool {
                $isValueSameAs = new SameAs($value);
                foreach ($this->value as $value) {
                    if ($isValueSameAs($value)) {
                        return true;
                    }
                }
                return false;
            }
        );
    }
}