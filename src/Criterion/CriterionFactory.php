<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criterion;

class CriterionFactory
{
    /** @var CriterionClassNameProvider */
    private $classNameProvider;

    public function __construct(CriterionClassNameProvider $classNameProvider)
    {
        $this->classNameProvider = $classNameProvider;
    }

    public function createFromSerialized(array $serialized) : callable
    {
        /** @var Criterion $criterionClassName */
        $criterionClassName = $this->classNameProvider->getByCriterionName($serialized['name']);
        return $criterionClassName::deserialize($serialized);
    }
}