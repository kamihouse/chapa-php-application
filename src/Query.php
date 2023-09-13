<?php

declare(strict_types=1);

namespace ChapaPhp\Application;

use ChapaPhp\Domain\Message;

/**
 * @template H
 * @template P
 *
 * @extends Message<H, P>
 */
abstract class Query extends Message
{
}
