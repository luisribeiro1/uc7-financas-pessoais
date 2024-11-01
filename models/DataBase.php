<?php

class DataBase{
    private static $connection = null;

    public static getConexao(){
        if($connection == null){
            $host = "localhost";
            $senha = "";
            $db = "financas_pessoais";
            $user = "root";
        

        try{
            self::$connection - new PDO(
                "mysql:host=$host;dbname=$db", $senha, $user
            );

            self::$connection->setAttribute(
                PDO::ATRR_ERRMODE
                PDO::ERRMODE_EXCEPTION
            );
        }catch(PDOException $erro){
            echo "erro de conexão" . $erro;
        }
    }
    return self::$connection;
    }
}