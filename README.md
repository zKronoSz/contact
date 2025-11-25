🧰 1. PRÉ-REQUISITOS (INSTALAR ANTES DE TUDO)

Antes de instalar o projeto, você precisa ter no computador:

✔️ PHP 8+

(Instalado automaticamente no Laragon e no XAMPP)

✔️ Servidor local (Escolha um):
1) LARAGON (RECOMENDADO)

Download: https://laragon.org/download

Pasta onde os projetos ficam: C:\laragon\www\

2) XAMPP (ALTERNATIVA)

Download: https://www.apachefriends.org

Pasta onde os projetos ficam:

C:\xampp\htdocs\
=====================================================================================
📥 2. BAIXAR O PROJETO (2 OPÇÕES)
🔹 OPÇÃO A — Clonar via Git

Abra o CMD dentro da pasta do seu servidor PHP:

👉 Se usa Laragon:
cd C:\laragon\www

👉 Se usa XAMPP:
cd C:\xampp\htdocs


Agora clone o repositório:

git clone https://github.com/SEU-USUARIO/contact.git

🔹 OPÇÃO B — Baixar ZIP

Entre no GitHub
========================================================================================================
📝 3. RENOMEAR A PASTA PARA DADOSCONTATO

Depois de baixar ou clonar, você DEVE renomear a pasta para esse nome exato: DADOSCONTATO

cd C:\laragon\www
Rename-Item -Path "contact" -NewName "DADOSCONTATO"

Ou renomeie manualmente.

Este nome é OBRIGATÓRIO pois o projeto usa:

RewriteBase /DADOSCONTATO/public/
============================================================================================================
🗄️ 4. IMPORTAR O BANCO DE DADOS

Dentro do projeto tem uma pasta chamada:

database/

Dentro dela existe um arquivo:

database.sql

Esse arquivo deve ser importado no MySQL/MariaDB usando:

phpMyAdmin

Workbench

HeidiSQL

Laragon Database

Ou qualquer outro gerenciador.
=================================================================================
Crie um banco com o nome:

gerencia_numeros


E importe o arquivo.
==============================================================================
⚙️ 5. CONFIGURAR O ARQUIVO .env

Abra o projeto no VS Code:

code DADOSCONTATO


Abra o arquivo .env e coloque suas configurações:

DB_HOST=localhost
DB_NAME=gerencia_numeros
DB_USER=root
DB_PASS=


Se sua senha tiver algo, coloque lá.
=======================================================================================
🔧 6. AJUSTAR O .htaccess

Dentro da pasta public/ existe o arquivo:

.htaccess


Ele deve conter:

<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On

    RewriteBase /DADOSCONTATO/public/

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
=-=========================================================================================================
🚀 7. INSTALAR DEPENDÊNCIAS DO COMPOSER

Dentro da pasta do projeto:

cd C:\laragon\www\DADOSCONTATO
composer install


Isso garante compatibilidade total com sua versão.
====================================================================================================================
🌐 8. ACESSAR O PROJETO

Depois de tudo configurado:

Abra no navegador:

http://localhost/DADOSCONTATO/public
=============================================================================================================================

🎉 Projeto instalado e funcionando!


