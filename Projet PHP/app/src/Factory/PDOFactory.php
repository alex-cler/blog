<?php

namespace App\Factory;
//Todo check securité pour ne pas avoir le password d'affiché 
use App\Interfaces\ConnectionInterface;
use PDO;

class PDOFactory implements ConnectionInterface
{
    private static string $dsn = 'mysql:host=db';
    private static string $username = 'root';
    private static string $password = 'vY!&WjT%cP02';
    const DATABASE = 'db'; 

    public static function getMysqlConnection(){
        try {
            $db = new PDO(self::$dsn, self::$username, self::$password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (\Exception $e){
            echo 'Erreur : ' . $e->getMessage();
        }
        return $db;
    }

    public function getConnection(): PDO {
        return self::getMysqlConnection();
    }
}
