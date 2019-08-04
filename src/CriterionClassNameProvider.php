<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator;

use Comquer\Collection\Collection;
use Comquer\Collection\Type;
use Comquer\Collection\UniqueIndex;
use Comquer\CriteriaEvaluator\Criteria\EqualTo;
use Comquer\CriteriaEvaluator\Criteria\EqualToOneOf;
use Comquer\CriteriaEvaluator\Criteria\GreaterThan;
use Comquer\CriteriaEvaluator\Criteria\GreaterThanOrEqualTo;
use Comquer\CriteriaEvaluator\Criteria\LessThan;
use Comquer\CriteriaEvaluator\Criteria\LessThanOrEqualTo;
use Comquer\CriteriaEvaluator\Criteria\NotEqualTo;
use Comquer\CriteriaEvaluator\Criteria\NotSameAs;
use Comquer\CriteriaEvaluator\Criteria\SameAsOneOf;

class CriterionClassNameProvider extends Collection
{
    /** @var array */
    private const CRITERION_CLASS_NAMES = [
        EqualTo::class,
        EqualToOneOf::class,
        EqualToOneOf::class,
        GreaterThan::class,
        GreaterThanOrEqualTo::class,
        LessThan::class,
        LessThanOrEqualTo::class,
        NotEqualTo::class,
        NotSameAs::class,
        SameAsOneOf::class,
    ];

    public function __construct()
    {
        parent::__construct(
            self::CRITERION_CLASS_NAMES,
            Type::string(),
            new UniqueIndex(function (string $className) {
                return $className;
            })
        );
    }

    public function getByCriterionName(string $criterionName) : string
    {
        foreach ($this as $criterionClassName) {
            if ($criterionClassName::getName() === $criterionName) {
                return $criterionClassName;
            }
        }

        // throw exception
    }
}