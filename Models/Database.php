<?php
class Database {
    private static $conexao = null;

        public static function getConexao(){

            if (self ::$conexao == null){
                $host = "localhost";
                $nomeDoBanco = "financas";
                $usuario = "root";
                $senha = "";
    
                try{
    
                 self::$conexao = new PDO(
                    "mysql:host=$host;dbname=$nomeDoBanco",
                    $usuario,
                    $senha
                 );
                 self::$conexao->setAttribute(
                   PDO::ATTR_ERRMODE,
                   PDO::ERRMODE_EXCEPTION
                 );
    
                }catch (PDOException $erro) {
                    echo "Erro de conexao: " . $erro->getMessage();
                }
            }
            return self::$conexao;
    
        }

}