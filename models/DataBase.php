<?php 


class DataBase {

    private static $conexao;

    public static function getConexao(){

        if(self::$conexao == null){
            $host = "localhost";
            $nomeDoBanco = "financas_pessoais";
            $usuario = "root";
            $senha = "";

            try {
                self::$conexao = new PDO(
                    "mysql:host=$host;dbname=$nomeDoBanco",
                    $usuario,
                    $senha
                );
                self::$conexao->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            }catch(PDOException $erro){
                echo "erro de conexão" . $erro>getMessage();
            }
        }
        return self::$conexao;
    }
}