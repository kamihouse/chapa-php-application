<?php

declare(strict_types=1);

namespace Tests\Unit\Error;

use ChapaPhp\Application\Error\ApplicationError;
use Exception;
use Tests\TestCase;

/**
 * @internal
 */
final class ApplicationErrorTest extends TestCase
{
    /**
     * @test
     */
    public function should_be_an_instance_of_exception(): void
    {
        $this->assertInstanceOf(Exception::class, new ApplicationError(''));
    }

    /**
     * @test
     */
    public function should_be_an_instance_of_application_error(): void
    {
        $this->assertInstanceOf(ApplicationError::class, new ApplicationError(''));
    }
}
