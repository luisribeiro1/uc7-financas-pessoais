<?php

class DataBase{
    private static $connection = null;

    public static function getConexao(){
        if(self::$connection === null){
            $host = "localhost";
            $dbname = "financas_pessoais";
            $user = "root";
            $senha = "";

            try {
                self::$connection = new PDO(
                    "mysql:host=$host;dbname=$dbname;", 
                    $user, 
                    $senha
                );
                self::$connection->setAttribute(
                    PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {
                echo 'Erro de conexão: ' . $e->getMessage();
            }
    }
    return self::$connection;
    }
}