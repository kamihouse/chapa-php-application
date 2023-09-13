<?php

declare(strict_types=1);

namespace ChapaPhp\Application;

use Exception;

/**
 * @template TValue of object|string|int|float|bool
 * @template TError of Exception
 */
class Result
{
    /**
     * @param TValue $value
     * @param TError $error
     */
    protected function __construct(protected bool $isSuccess, protected mixed $value, protected ?Exception $error)
    {
    }

    /**
     * @param TValue $value
     *
     * @return Result<TValue, null>
     */
    public static function success(mixed $value): Result
    {
        return new self(true, $value, null);
    }

    /**
     * @param TError $error
     *
     * @return Result<null, TError>
     */
    public static function failure(object $error): Result
    {
        return new self(false, null, $error);
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    public function isFailure(): bool
    {
        return !$this->isSuccess;
    }

    /**
     * @return ?TValue
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @return ?TError
     */
    public function getError(): ?object
    {
        return $this->error;
    }
}
