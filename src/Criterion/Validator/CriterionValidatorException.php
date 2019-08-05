<?php declare(strict_types=1);

namespace Comquer\CriteriaEvaluator\Criterion\Validator;

use Comquer\Validator\EntityValidator\EntityValidatorException;
use RuntimeException;

final class CriterionValidatorException extends RuntimeException
{
    public static function forMissingFields(EntityValidatorException $exception) : self
    {
        return new self($exception->getMessage());
    }

    public static function forNameMismatch(string $actual, string $expected) : self
    {
        return new self("Criterion name `$expected` does not match expected `$actual");
    }
}