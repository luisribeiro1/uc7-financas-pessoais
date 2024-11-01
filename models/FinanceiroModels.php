<?php

require "DataBase.php";

class Financas {

    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }
    

    public function getAll(){
        $result = $this->db->query("SELECT * FROM financeiro_pessoal");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id_financeiro){
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro=?");
        $sql->execute([$id_financeiro]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }


    public function insert($id_financeiro,$data,$descricao,$valor,$deb_cred,$status){
        $sql = $this->db->prepare("INSERT INTO financeiro_pessoal (id_financeiro, data, descricao, valor, deb_cred, status) VALUES (?,?,?,?,?,?)");
        return $sql->execute([$id_financeiro,$data,$descricao,$valor,$deb_cred,$status]);
    }
    
    public function update($id_financeiro){
        $sql = $this->db->prepare("UPDATE financeiro_pessoal set  status=? Where id_financeiro=?");

        return $sql->execute(["cancelado",$id_financeiro]);

    }
}