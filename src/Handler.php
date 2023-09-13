<?php

declare(strict_types=1);

namespace ChapaPhp\Application;

/**
 * @template T Message|Event
 * @template R
 */
interface Handler
{
    /**
     * @param T $context
     *
     * @return R
     */
    public function handle($context);
}
