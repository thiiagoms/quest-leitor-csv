<?php

declare(strict_types=1);

namespace Quest\Infra\Repositories\File;

use Quest\Infra\Repositories\Repository;

/**
 * File repository
 *
 * @package Quest\Infra\Repositories\File
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
class FileRepository extends Repository
{
    /**
     * @var string
     */
    private const FILE_PATH = __DIR__ . '/../../../../';

    /**
     * Retrieve users data from csv file
     *
     * @return array
     */
    public function index(): array
    {
        $file = fopen(self::FILE_PATH . 'users.csv', 'r');

        $users = [];

        while (($data = fgetcsv($file, 1000, ';')) !== false) {
            $users[] = [
                'name'  => strip_tags($data[0]),
                'email' => strip_tags($data[1])
            ];
        }

        fclose($file);

        return $users;
    }
}
