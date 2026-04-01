<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

// ─── Twig Setup ───────────────────────────────────────────────────────────────

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');

$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../var/cache',
    'debug' => true,
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

// ─── Basic Router (Front Controller) ─────────────────────────────────────────

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Strip trailing slash (except root)
if ($requestUri !== '/' && str_ends_with($requestUri, '/')) {
    $requestUri = rtrim($requestUri, '/');
}

$routes = [
    'GET' => [
        '/'      => [HomeController::class, 'index'],
        '/about' => [HomeController::class, 'about'],
    ],
];

$handler = $routes[$requestMethod][$requestUri] ?? null;

if ($handler === null) {
    http_response_code(404);
    echo $twig->render('404.html.twig', ['uri' => $requestUri]);
    exit;
}

[$controllerClass, $method] = $handler;

$controller = new $controllerClass($twig);
$controller->$method();
