<?php declare(strict_types=1);

namespace Comquer\Comparator;

use Comquer\Comparator\Conditions\NotEqualTo;
use Comquer\Validator\EntityValidator\EntityValidator;
use InvalidArgumentException;

abstract class Comparator
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

        $isNameInvalid = (new NotEqualTo(static::getName()));
        if ($isNameInvalid($serialized['name'])) {
            throw new InvalidArgumentException();
        }
    }
}