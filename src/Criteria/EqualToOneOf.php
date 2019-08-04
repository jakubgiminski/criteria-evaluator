<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criteria;

use Comquer\CriteriaEvaluator\Criterion;

final class EqualToOneOf extends Criterion
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

    public static function getName() : string
    {
        return 'is value equal to one of';
    }
}