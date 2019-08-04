<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator;

use Comquer\CriteriaEvaluator\Criteria\NotEqualTo;
use Comquer\Validator\EntityValidator\EntityValidator;

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

    public function __invoke($value) : bool
    {
        return ($this->evaluateFor)($value);
    }

    abstract public static function getName() : string;

    public function serialize() : array
    {
        return [
            'name' => static::getName(),
            'value' => $this->value,
        ];
    }

    public static function deserialize(array $serialized) : callable
    {
        self::validateSerialized($serialized);
        return new static($serialized['value']);
    }

    private static function validateSerialized(array $serialized) : void
    {
        EntityValidator::validateSerialized(
            static::getName(),
            ['name', 'value'],
            $serialized
        );

        $nameIsInvalid = (new NotEqualTo(static::getName()));
        if ($nameIsInvalid($serialized['name'])) {
            // throw exception
        }
    }
}