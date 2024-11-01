<?php

class DataBase
{
  private static $conexao = null;

  public static function getConexao() {
    if (self::$conexao == null) {
      $host = "localhost";
      $nomeBanco = "financas_pessoais";
      $user = "root";
      $password = "";

      try {
        self::$conexao = new PDO(
          "mysql:host=$host;
          dbname=$nomeBanco",
          $user,
          $password
        );
        self::$conexao-> setAttribute(
          PDO::ATTR_ERRMODE,
          PDO::ERRMODE_EXCEPTION
        );

      } catch (PDOException $e) {
        echo "Erro de conexão: " . $e -> getMessage();
      }
    }
    return self::$conexao;
  }
}