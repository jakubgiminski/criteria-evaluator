<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criteria;

use Comquer\CriteriaEvaluator\Criterion\Criterion;

final class LessThanOrEqualTo extends Criterion
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

    public static function getName() : string
    {
        return 'is value less than or equal to';
    }
}