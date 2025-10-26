<?php
// 3. Inicialização do Doctrine ORM e conexão com banco
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__ . '/../src/Entity'],
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

// Pega dados do .env
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'host'     => '127.0.0.1',
    'port'     => 3306,
    'dbname'   => 'medias',
];

// Parse DATABASE_URL do .env
$dbUrl = $_ENV['DATABASE_URL'] ?? '';
if (preg_match('/mysql:\/\/(.*):(.*)@(.*):(\d+)\/(.*)/', $dbUrl, $matches)) {
    $dbParams = [
        'driver'   => 'pdo_mysql',
        'user'     => $matches[1],
        'password' => $matches[2],
        'host'     => $matches[3],
        'port'     => $matches[4],
        'dbname'   => $matches[5],
    ];
} else {
    throw new Exception('DATABASE_URL inválida ou não encontrada no .env');
}

$entityManager = EntityManager::create($dbParams, $config);
