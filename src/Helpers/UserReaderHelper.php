<?php

declare(strict_types=1);

namespace Src\Helpers;

/**
 * File Reader Helper
 *
 * @package Src\Helpers
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class UserReaderHelper
{
    /**
     * Return user data from csv folder
     *
     * @param [type] $handler
     * @return array
     */
    final public static function readData($handler): array
    {
        $row = 0;
        $users = [];

        while (($data = fgetcsv($handler, 1000, ';'))) {
            if ($row === 0) {
                # skip header
                $row++;
                continue;
            }

            $users[$row]['name']  = $data[0];
            $users[$row]['email'] = $data[1];

            $row++;
        }

        return $users;
    }
}
