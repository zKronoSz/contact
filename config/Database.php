<?php 

namespace Config;

use PDO;
use PDOException;

class Database {

    private static ?PDO $pdo = null;

    public static function getConnection(): PDO {
        if (self::$pdo === null) {
            try {
                $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
                $dotenv->load();
                $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

                $host = $_ENV['DB_HOST'];
                $name = $_ENV['DB_NAME'];
                $user = $_ENV['DB_USER'];
                $password = $_ENV['DB_PASS'];

                $dsn = "mysql:host=$host;dbname=$name;charset=utf8mb4";

                self::$pdo = new PDO($dsn, $user, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);

            } catch (PDOException $e) {
                die("Erro ao conectar ao banco: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }

     /**
     * Método específico para testes - conexão com SQLite em memória
     */
    public static function getTestConnection(): PDO {
        try {
            $pdo = new PDO('sqlite::memory:');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            // Cria tabelas para testes
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS usuarios (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nome VARCHAR(255),
                    email VARCHAR(255) UNIQUE,
                    senha VARCHAR(255),
                    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
                )
            ");
            
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS contatos (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    id_usuario INTEGER,
                    nome VARCHAR(255),
                    numero VARCHAR(9),
                    status VARCHAR(50),
                    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
                )
            ");
            
            return $pdo;
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de teste: " . $e->getMessage());
        }
    }
}

