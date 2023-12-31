<?php

declare(strict_types=1);

namespace ChapaPhp\Application\Error;

use Exception;
use Throwable;

class ApplicationError extends Exception
{
    public function __construct(
        string $message,
        int $code = 2,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
