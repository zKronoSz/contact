<?php
require_once __DIR__ . '/vendor/autoload.php';

use Config\Database\Database;

try {
    $pdo = Database::getConnection();
    echo "Conexão com o banco OK!";
    var_dump($pdo);
} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage();
}
