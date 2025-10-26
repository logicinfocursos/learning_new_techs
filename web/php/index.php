<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiUrl = $_ENV['API_URL'] ?? 'http://localhost:7111';
$appPort = $_ENV['APP_PORT'] ?? '8114';

function getMovies($apiUrl) {
    $json = file_get_contents($apiUrl . '/movies');
    return json_decode($json, true);
}

$movies = getMovies($apiUrl);

// Renderiza o template
include __DIR__ . '/templates/index.html';
