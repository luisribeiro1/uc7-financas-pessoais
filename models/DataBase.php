<?php

class DataBase{
    private static $conexao = null;

    public static function getConexao(){
             # testa se a conexao ja existe para evitar uma nova conexao 
             if(self::$conexao == null){
            
                $host = "localhost";
                $nomeDoBanco = "financas_pessoais";
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
    
                } catch(PDOException $erro){
                    echo "Erro de conexão: " . $erro->getMessage();
                }
            }
            return self::$conexao; 
    }

}