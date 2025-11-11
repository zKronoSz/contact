<?php

namespace App\Controllers\Pages;

use Config\Database;
use PDO;

class LoginController {

    public static function registrar($dados) {
        $pdo = Database::getConnection();

        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);

        // Verifica se o e-mail já existe
        $check = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $check->execute([$email]);
        if ($check->rowCount() > 0) {
            echo "<script>alert('E-mail já cadastrado!'); window.history.back();</script>";
            exit;
        }

        // Insere o novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha]);

        // Inicia sessão e salva dados do usuário
        session_start();
        $_SESSION['usuario'] = [
            'id' => $pdo->lastInsertId(),
            'nome' => $nome,
            'email' => $email
        ];

        // Redireciona para o dashboard
        header("Location: " . BASE_URL . "/dashboard");
        exit;
    }

    // NOVO MÉTODO ADICIONADO
    public static function autenticar($dados) {
        $pdo = Database::getConnection();

        $email = trim($dados['email'] ?? '');
        $senha = $dados['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
            exit;
        }

        // Busca usuário no banco
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se existe e se a senha confere
        if (!$usuario || !password_verify($senha, $usuario['senha'])) {
            echo "<script>alert('E-mail ou senha inválidos!'); window.history.back();</script>";
            exit;
        }

        // Inicia sessão e guarda dados
        session_start();
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email']
        ];

        // Redireciona para o dashboard
        header("Location: " . BASE_URL . "/dashboard");
        exit;
    }
}
