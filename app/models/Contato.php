<?php

namespace App\Models;

use Config\Database;
use PDO;

class Contato
{

    public static function listarPorUsuario($idUsuario)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM contatos WHERE id_usuario = ? ORDER BY criado_em DESC");
        $stmt->execute([$idUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function criar($idUsuario, $nome, $numero, $status)
    {
        
        if (!preg_match('/^[0-9]{9}$/', $numero)) {
            throw new \Exception("O número deve conter exatamente 9 dígitos (somente números, sem DDD).");
        }


        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO contatos (id_usuario, nome, numero, status, criado_em)
            VALUES (?, ?, ?, ?, NOW())
        ");
        $stmt->execute([$idUsuario, $nome, $numero, $status]);
    }

    public static function deletar($idContato, $idUsuario)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM contatos WHERE id = ? AND id_usuario = ?");
        $stmt->execute([$idContato, $idUsuario]);
    }
    public static function editar($idContato, $idUsuario, $nome, $numero, $status)
    {

        if (!preg_match('/^[0-9]{9}$/', $numero)) {
            throw new \Exception("O número deve conter exatamente 9 dígitos (somente números, sem DDD).");
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE contatos SET nome = ?, numero = ?, status = ? WHERE id = ? AND id_usuario = ?");
        $stmt->execute([$nome, $numero, $status, $idContato, $idUsuario]);
    }
}
