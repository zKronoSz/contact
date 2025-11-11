<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\Pages\HomeController;
use App\Controllers\Pages\LoginController;
use App\Controllers\DashboardController;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define a URL base do projeto
define('BASE_URL', '/DADOSCONTATO/public');

// Pega a URL e método HTTP
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Remove o prefixo BASE_URL da URI
if (str_starts_with(strtolower($uri), strtolower(BASE_URL))) {
    $uri = substr($uri, strlen(BASE_URL));
}

// Se a URI ficar vazia, considera "/"
if ($uri === '' || $uri === false) {
    $uri = '/';
}

// Roteamento
switch ($uri) {
    case '/':
    case '/login':
        if ($method === 'POST') {
            LoginController::autenticar($_POST);
        } else {
            echo HomeController::getHome();
        }
        break;

    case '/registrar':
        if ($method === 'POST') {
            LoginController::registrar($_POST);
        }
        break;

    case '/dashboard':
        DashboardController::getDashboard();
        break;

    case '/dashboard/criarContato':
        if ($method === 'POST') {
            DashboardController::criarContato($_POST);
        }
        break;

    case '/dashboard/editarContato':
        if ($method === 'POST') {
            DashboardController::editarContato($_POST);
        }
        break;

    case '/dashboard/deletarContato':
        if ($method === 'POST') {
            DashboardController::deletarContato($_POST);
        }
        break;

    case '/logout':
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
