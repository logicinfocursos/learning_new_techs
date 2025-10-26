<?php
// 0. Importações de dependências
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Dotenv\Dotenv;
use Entity\Movie;

// 1. Carrega variáveis do .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$apiPort = $_ENV['API_PORT'] ?? 7116;

// 2. Inicialização do framework Slim
$app = AppFactory::create();

// 3. Inicialização do ORM (Doctrine)
require_once __DIR__ . '/database/db.php'; // $entityManager

// 4. Middlewares (CORS)
$app->add(function (Request $request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// 5. Definição das rotas da API

$app->get('/movies', function (Request $request, Response $response) use ($entityManager) {
    $movies = $entityManager->getRepository(Movie::class)->findAll();
    // Serializa cada objeto Movie em array
    $moviesArray = array_map(function($movie) {
        return [
            'id' => $movie->getId(),
            'name' => $movie->getName(),
            'overview' => $movie->getOverview(),
            'posterurl' => $movie->getPosterurl(),
            'genres' => $movie->getGenres(),
        ];
    }, $movies);
    $response->getBody()->write(json_encode($moviesArray));
    return $response->withHeader('Content-Type', 'application/json');
});


$app->get('/movies/{id}', function (Request $request, Response $response, $args) use ($entityManager) {
    $movie = $entityManager->find(Movie::class, $args['id']);
    if ($movie) {
        $movieArray = [
            'id' => $movie->getId(),
            'name' => $movie->getName(),
            'overview' => $movie->getOverview(),
            'posterurl' => $movie->getPosterurl(),
            'genres' => $movie->getGenres(),
        ];
        $response->getBody()->write(json_encode($movieArray));
        return $response->withHeader('Content-Type', 'application/json');
    }
    $response->getBody()->write(json_encode(['error' => 'Filme não encontrado']));
    return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
});

$app->post('/movies', function (Request $request, Response $response) use ($entityManager) {
    $data = json_decode($request->getBody()->getContents(), true);
    $movie = new Movie();
    $movie->setName($data['name'] ?? null);
    $movie->setOverview($data['overview'] ?? null);
    $movie->setPosterurl($data['posterurl'] ?? null);
    $movie->setGenres($data['genres'] ?? null);
    $entityManager->persist($movie);
    $entityManager->flush();
    $response->getBody()->write(json_encode($movie));
    return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
});

$app->put('/movies/{id}', function (Request $request, Response $response, $args) use ($entityManager) {
    $movie = $entityManager->find(Movie::class, $args['id']);
    if (!$movie) {
        $response->getBody()->write(json_encode(['error' => 'Filme não encontrado']));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }
    $data = json_decode($request->getBody()->getContents(), true);
    $movie->setName($data['name'] ?? $movie->getName());
    $movie->setOverview($data['overview'] ?? $movie->getOverview());
    $movie->setPosterurl($data['posterurl'] ?? $movie->getPosterurl());
    $movie->setGenres($data['genres'] ?? $movie->getGenres());
    $entityManager->flush();
    $response->getBody()->write(json_encode($movie));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->delete('/movies/{id}', function (Request $request, Response $response, $args) use ($entityManager) {
    $movie = $entityManager->find(Movie::class, $args['id']);
    if (!$movie) {
        $response->getBody()->write(json_encode(['error' => 'Filme não encontrado']));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }
    $entityManager->remove($movie);
    $entityManager->flush();
    return $response->withStatus(204);
});

// 6. Inicialização do servidor na porta definida (API_PORT)
$app->run();
