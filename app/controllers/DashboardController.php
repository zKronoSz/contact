<?php

namespace App\Controllers;

use App\Models\Contato;

class DashboardController
{
    public static function getDashboard()
    {
        // Garante que a sessão existe
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Se o usuário não estiver logado, volta pro login
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/");
            exit;
        }

        // Pega usuário da sessão
        $usuario = $_SESSION['usuario'];

        // Busca os contatos do usuário logado
        $contatos = Contato::listarPorUsuario($usuario['id']);

        // Disponibiliza $contatos pra view
        include __DIR__ . '/../../resources/views/pages/dashboard.php';
    }

    public static function criarContato($dados)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/");
            exit;
        }

        $usuarioId = $_SESSION['usuario']['id'];

        // Chama o model pra salvar o contato
        \App\Models\Contato::criar($usuarioId, $dados['nome'], $dados['numero'], $dados['status']);

        // Redireciona de volta pro dashboard
        header("Location: " . BASE_URL . "/dashboard");
        exit;
    }
    public static function editarContato() {
    session_start();
    $usuario = $_SESSION['usuario'] ?? null;

    if (!$usuario) {
        header("Location: " . BASE_URL . "/");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idContato = $_POST['id'];
        $nome = $_POST['nome'];
        $numero = $_POST['numero'];
        $status = $_POST['status'];

        \App\Models\Contato::editar($idContato, $usuario['id'], $nome, $numero, $status);
    }

    header("Location: " . BASE_URL . "/dashboard");
    exit;
}

public static function deletarContato() {
    session_start();
    $usuario = $_SESSION['usuario'] ?? null;

    if (!$usuario) {
        header("Location: " . BASE_URL . "/");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idContato = $_POST['id'];
        \App\Models\Contato::deletar($idContato, $usuario['id']);
    }

    header("Location: " . BASE_URL . "/dashboard");
    exit;
}
}
