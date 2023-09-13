<?php

declare(strict_types=1);

namespace ChapaPhp\Application;

enum HeaderKey: string
{
    case SOURCE = 'source';
    case TIMESTAMP = 'timestamp';
}
