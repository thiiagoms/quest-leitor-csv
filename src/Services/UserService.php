<?php

declare(strict_types=1);

namespace Src\Services;

use Src\Helpers\UserReaderHelper;
use Src\Repositories\UserRepository;
use PrettyPrint\Printer;

/**
 * User Service
 *
 * @package Src\Services
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class UserService
{
    /**
     * User Repository default path
     *
     * @var UserRepository
     */
    private UserRepository $userRepo;

    /**
     * Default csv location
     *
     * @var string
     */
    private const FILEPATH = __DIR__ . '/../../';

    /**
     * Init service with repository
     */
    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    /**
     * Search user
     *
     * @param string $userName
     * @return boolean|array
     */
    private function searchUser(string $userName): bool|array
    {
        $result = $this->userRepo->userSearch($userName);
        return empty($result)
            ? false
            : $result;
    }

    /**
     * Create user
     *
     * @param array $data
     * @return void
     */
    public function createUser(array $data): void
    {
        $userName = strip_tags($data['name']);
        $userEmail = strip_tags($data['email']);

        $this->userRepo->userCreate(['name' => $userName, 'email' => $userEmail]);
    }

    /**
     * Undocumented function
     *
     * @param integer $userId
     * @param string $data
     * @return void
     */
    public function updateUser(int $userId, string $data)
    {
        $this->userRepo->userUpdate($userId, $data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function seedUsers(string $fileName)
    {
        $usersFile = fopen(self::FILEPATH . $fileName, 'r');
        $userData = UserReaderHelper::readData($usersFile);
        fclose($usersFile);

        $usersCount = 0;
        $usersUpdate = 0;

        foreach ($userData as $key => $value) {
            $userExists = $this->searchUser($value['name']);

            if ($userExists === false and isset($value)) {
                $this->createUser($value);
                $usersCount++;
                continue;
            }
            $this->updateUser($userExists[0]['id'], $value['email']);
            echo "Chegou aqui\n";
            $usersUpdate++;
        }

        Printer::warning("Quantidade de usuarios criados pelo seed: {$usersCount}");
        Printer::warning("Quantidade de usuarios atualizados pelo seed: {$usersUpdate}");
    }
}
