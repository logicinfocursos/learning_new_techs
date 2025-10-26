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
    'password' => 'rootpassword',
    'host'     => '127.0.0.1',
    'port'     => 3309,
    'dbname'   => 'medias',
];

$entityManager = EntityManager::create($dbParams, $config);
