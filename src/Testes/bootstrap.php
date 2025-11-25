<?php
// Bootstrap para testes - caminho corrigido
require_once __DIR__ . '/../../vendor/autoload.php';

// Configurações para testes
define('BASE_URL', 'http://localhost:8000');

// Configura timezone
date_default_timezone_set('America/Sao_Paulo');

// Inicia sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo "Bootstrap carregado com sucesso!\n";
?>