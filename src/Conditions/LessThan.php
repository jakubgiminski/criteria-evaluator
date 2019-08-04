<?php declare(strict_types=1);

namespace Comquer\Comparator\Conditions;

use Comquer\Comparator\Comparator;

class LessThan extends Comparator
{
    public function __construct($value)
    {
        parent::__construct(
            $value,
            function ($value) : bool {
                return $value < $this->value;
            }
        );
    }

    public static function getName() : string
    {
        return 'is value less than';
    }
}