<?php

declare(strict_types=1);

if (php_sapi_name() != 'cli') {
    echo '<h1>Aplicação deve ser executada via CLI</h1>';
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use Src\Controllers\{BannerController, UserController};
use Src\Helpers\EnvHelper;
use Src\Services\UserService;
use PrettyPrint\Printer;

EnvHelper::loadEnv();

BannerController::init();

$userApp = new UserController(new UserService());

Printer::info("=> Executando seeder (users_seed_example.csv) e populando a base de dados com usuários");
$userApp->seedUsers('users_seeder_example.csv');

Printer::info("=> Executando seeder (user_seeder_changes_quest.csv) e fazendo as alteracoes no banco");
$userApp->seedUsers('users_seeder_changes_quest.csv');