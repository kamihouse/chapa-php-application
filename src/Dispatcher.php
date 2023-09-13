<?php

declare(strict_types=1);

namespace ChapaPhp\Application;

use ChapaPhp\Domain\Event;
use ChapaPhp\Domain\Message;
use Ds\Collection;

/**
 * @template T of Message|Event|Collection<Message|Event>
 * @template R
 */
interface Dispatcher
{
    /**
     * @param T $context
     *
     * @return R
     */
    public function dispatch($context);
}
