<?php

declare(strict_types=1);

namespace Tests\Unit;

use ChapaPhp\Application\Result;
use Exception;
use Tests\TestCase;

/**
 * @internal
 */
final class ResultTest extends TestCase
{
    /**
     * @test
     */
    public function should_provide_a_value_and_assert_that_the_returned_result_object_indicates_success(): void
    {
        $result = Result::success('value');

        $this->assertTrue($result->isSuccess());
        $this->assertSame('value', $result->getValue());
        $this->assertFalse($result->isFailure());
        $this->assertNull($result->getError());
    }

    /**
     * @test
     */
    public function should_provide_an_error_value_and_assert_that_the_returned_result_object_indicates_failure(): void
    {
        $error = new Exception('error');
        $result = Result::failure($error);

        $this->assertTrue($result->isFailure());
        $this->assertNull($result->getValue());
        $this->assertSame($error, $result->getError());
        $this->assertFalse($result->isSuccess());
        $this->assertTrue($result->isFailure());
    }
}
