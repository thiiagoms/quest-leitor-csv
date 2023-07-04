<?php

declare(strict_types=1);

namespace Quest\Helpers;

/**
 * Env helper
 *
 * @package Quest\Repositories
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
final class Logger
{
    private const LOG_PATH = __DIR__ . '/../../logs/';

    private static function write(string $message)
    {
        $file = fopen(self::LOG_PATH .  'logs.txt', 'a+');
        fwrite($file, $message . PHP_EOL);
        fclose($file);
    }

    public static function log(string $message): void
    {
        $date = date('Y-m-d');
        $timestamps = date('H:i:s');

        $log = "[$date - {$timestamps}] - {$message}";

        self::write($log);
    }
}
