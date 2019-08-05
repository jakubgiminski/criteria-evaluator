<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criterion\Validator;

use Comquer\CriteriaEvaluator\IsValue;
use Comquer\Validator\EntityValidator\EntityValidator;
use Comquer\Validator\EntityValidator\EntityValidatorException;

final class CriterionValidator
{
    private function __construct() {}

    public static function validateSerialized(string $criterionName, array $serialized) : void
    {
        try {
            EntityValidator::validateSerialized(
                $criterionName,
                ['name', 'value'],
                $serialized
            );
        } catch (EntityValidatorException $exception) {
            throw CriterionValidatorException::forMissingFields($exception);
        }

        if (IsValue::notEqualTo($criterionName)($serialized['name'])) {
            throw CriterionValidatorException::forNameMismatch($criterionName, $serialized['name']);
        }
    }
}