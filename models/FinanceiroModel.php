<?php

# Incluir o arquivo com conexão com o banco de dados
require_once "DataBase.php";

class Financeiro_Pessoal
{

    # Criar um atributo privado para receber a conexão com o banco 
    private $db;

    # Método construtor da classe. Ele será executado quando a classe for instanciada
    public function __construct(){

        # Executa o método estático para estabelecer a conexão com o banco de dados
        # Metodo estático é aquele que não precisa ser instanciado
        $this->db = DataBase::getConexao();
    }
    
    # Criar o método para retornar a lista de meses
    public function getAllFinancas(){
        // return $this->listaDeMesas;
        
        # Executa o código SQL no Banco de Dados através do método query
        # O método é usado para consultas, ou seja, quando usar SELECT
        $resultadoDaConsulta = $this->db->query("SELECT * FROM financas");

        # Retorna um array associativo com o resultado da consulta
        return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_financeiro) {
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id = ?");
        $sql->execute([$id_financeiro]);
        
        # Retorna um array associativo com o resultado da consulta
        return $sql->fetch(PDO::FETCH_ASSOC);
        }

    // Criar método para inserir os dados no card
    public function insert($id_financeiro){
        $sql = $this->db->prepare(
            "INSERT INTO financeiro_pessoal (id_financeiro,data,descricao,valor,deb_cred,status);
            VALUES(?,?,?,?,?,?)");
            return $sql->execute([$id_financeiro,$data,$decricao,$valor,$deb_cred,$status]);
    }
        # Executar o SQL para cancelar o registro 
        public function cancelar(){
            $sql = $this->db->prepare("UPDATE financeiro_pessoal SET STATUS = ? WHERE id_financeiro =?");
            return $sql->execute(["cancelado", $id_financeiro]);
        }
    
}