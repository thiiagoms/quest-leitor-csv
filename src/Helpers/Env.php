<?php

declare(strict_types=1);

namespace Quest\Helpers;

use Dotenv\Dotenv;
use PrettyPrint\Printer;

/**
 * Env helper
 *
 * @package Quest\Repositories
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
final class Env
{
    /**
     * @var string
     */
    private const ENV_DIR = __DIR__ . '/../../';


    /**
     * @return bool
     */
    private static function check(): bool
    {
        $path = self::ENV_DIR . '.env';

        return file_exists($path);
    }

    /**
     * @return void
     */
    public static function load(): void
    {
        if (!self::check()) {
            Printer::warning('.env file not found');
            Logger::log('.env file not found');
            exit;
        }

        (Dotenv::createImmutable(self::ENV_DIR))->load();
    }
}
