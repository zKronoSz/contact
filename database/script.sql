-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS gerencia_numeros
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE gerencia_numeros;

-- =========================
-- Tabela de Usuários
-- =========================
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- Tabela de Contatos
-- =========================
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    status ENUM('on', 'off') DEFAULT 'off',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_usuario_contato
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id)
        ON DELETE CASCADE
);