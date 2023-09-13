<?php

declare(strict_types=1);

$composerJson = json_decode(file_get_contents('composer.json'), true);
$composerJson['repositories'][0] = [
    'type' => 'path',
    'url' => '../fretepago-domain',
    'options' => [
        'symlink' => true,
    ],
];
file_put_contents('composer.json', json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
