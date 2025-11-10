<?php 

namespace Config\Database;

class Database{

    private static ?\PDO $pdo = null;

    public static function getConnection():\PDO{
        if(self::$pdo === null){
           try{ 
            $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
            $dotenv->load();
            $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
            
            $host = $_ENV['DB_HOST'];
            $name = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];

            $dsn = $dsn = "mysql:host=localhost;dbname=$name";

            self::$pdo = new \PDO($dsn, $user, $password, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false,
                ]);
             
        
            }catch(\PDOException $e){
                   $e->getMessage(); 
            }

        }
        return self::$pdo;
    }
}



?>