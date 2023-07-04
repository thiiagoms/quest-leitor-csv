<?php

declare(strict_types=1);

namespace Quest\Domain\Services;

use PrettyPrint\Printer;
use Quest\Infra\Repositories\User\UserRepository;
use Quest\Infra\Repositories\File\FileRepository;

/**
 * User service
 *
 * @package Quest\Domain\Services
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */

class UserService
{
    /**
     * @param FileRepository $fileRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        private readonly FileRepository $fileRepository,
        private readonly UserRepository $userRepository
    ) {
    }

    /**
     * @param string $name
     * @return bool|array
     */
    private function find(string $name): bool|array
    {
        $user = $this->userRepository->find('*', ['name' => $name]);

        return empty($user) ? true : $user;
    }

    /**
     * @return void
     */
    public function seed(): void
    {
        $data = $this->fileRepository->index();

        $userCreated = 0;
        $userUpdated = 0;

        array_map(function (array $user) use (&$userCreated, &$userUpdated): void {

            $userExists = $this->find($user['name']);

            if (!is_bool($userExists)) {
                $this->userRepository->update($user['email'], ['id' => $userExists[0]['id']]);

                $userUpdated++;
                return;
            }

            $this->userRepository->store($user);
            $userCreated++;
        }, $data);

        Printer::success("Quantidade de usuários inseridos: {$userCreated}");
        Printer::success("Quantidade de usuarios atualizados: {$userUpdated}");
    }
}
