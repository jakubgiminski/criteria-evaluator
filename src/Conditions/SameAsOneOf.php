<?php declare(strict_types=1);

namespace Comquer\Comparator\Conditions;

use Comquer\Comparator\Comparator;

class SameAsOneOf extends Comparator
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

    public static function getName() : string
    {
        return 'is value same as one of';
    }
}