<?php

declare(strict_types=1);

if (php_sapi_name() !== 'cli') {
    echo "<h1>Execução permitida apenas em modo CLI</h1>";
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use Quest\Commands\UserCommand;
use Quest\Domain\Services\UserService;
use Quest\Helpers\{
    Env,
    Container
};
use Quest\Infra\Repositories\{
    File\FileRepository,
    User\UserRepository
};

Env::load();

$container = new Container();

$container->set('FileRepository', fn(): FileRepository => new FileRepository());
$container->set('UserRepository', fn (): UserRepository => new UserRepository());

$container->set('UserService', fn (object $container): UserService => new UserService(
    $container->get('FileRepository'),
    $container->get('UserRepository')
));

$container->set('UserCommand', fn (object $container): UserCommand => new UserCommand(
    $container->get('UserService')
));

/** @var UserCommand $app */
$app = $container->get('UserCommand');
