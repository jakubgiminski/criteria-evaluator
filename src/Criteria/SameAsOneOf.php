<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criteria;

use Comquer\CriteriaEvaluator\Criterion;

final class SameAsOneOf extends Criterion
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