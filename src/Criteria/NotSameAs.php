<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criteria;

use Comquer\CriteriaEvaluator\Criterion;

final class NotSameAs extends Criterion
{
    public function __construct($value)
    {
        parent::__construct(
            $value,
            function ($value) : bool {
                return $value !== $this->value;
            }
        );
    }

    public static function getName() : string
    {
        return 'is value not same as';
    }
}