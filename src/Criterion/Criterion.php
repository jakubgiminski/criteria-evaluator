<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criterion;

use Comquer\CriteriaEvaluator\Criterion\Validator\CriterionValidator;

abstract class Criterion
{
    /** @var mixed */
    protected $value;

    /** @var callable */
    private $evaluateFor;

    public function __construct($value, callable $evaluateFor)
    {
        $this->value = $value;
        $this->evaluateFor = $evaluateFor;
    }

    abstract public static function getName() : string;

    public function __invoke($value) : bool
    {
        return ($this->evaluateFor)($value);
    }

    public function serialize() : array
    {
        return [
            'name' => static::getName(),
            'value' => $this->value,
        ];
    }

    public static function deserialize(array $serialized) : callable
    {
        CriterionValidator::validateSerialized(static::getName(), $serialized);

        return new static($serialized['value']);
    }
}