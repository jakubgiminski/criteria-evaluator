<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criteria;

use Comquer\CriteriaEvaluator\Evaluator;

class GreaterThan extends Evaluator
{
    public function __construct($value)
    {
        parent::__construct(
            $value,
            function ($value) : bool {
                return $value > $this->value;
            }
        );
    }

    public static function getName() : string
    {
        return 'is value greater than';
    }
}