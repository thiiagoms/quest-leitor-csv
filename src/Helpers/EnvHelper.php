<?php

declare(strict_types=1);

namespace Src\Helpers;

use Dotenv\Dotenv;

/**
 * Load env helper
 *
 * @package Src\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class EnvHelper
{
    /**
     * Default env path
     * 
     * @var string
     */
    private const ENVPATH = __DIR__ . '/../../';

    final public static function loadEnv(): void
    {
        (Dotenv::createMutable(self::ENVPATH))->load();
    }
}
