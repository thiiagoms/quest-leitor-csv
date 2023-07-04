<?php

namespace Feature\Services;

use Quest\Domain\Services\UserService;
use Quest\Infra\Repositories\{
    File\FileRepository,
    User\UserRepository

};
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{


    public function test_user_service_seed_method(): void
    {
        $fileRepositoryMock = $this->createMock(FileRepository::class);
        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userService = new UserService($fileRepositoryMock, $userRepositoryMock);

        $data = [
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        ];

        $fileRepositoryMock->expects($this->once())
            ->method('index')
            ->willReturn($data);

        $userRepositoryMock->expects($this->exactly(2))
            ->method('find')
            ->willReturnOnConsecutiveCalls([], [['id' => 1], ['id' => 2]]);

        $userRepositoryMock->expects($this->once())
            ->method('store')
            ->with($data[0]);

        $userRepositoryMock->expects($this->once())
            ->method('update')
            ->with($data[1]['email'], ['id' => 1]);

        $userService->seed();
    }
}