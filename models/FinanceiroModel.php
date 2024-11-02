<?php

require_once "DataBase.php";

class Financeiro {
    private $db;

    public function __construct(){ 
        $this->db = DataBase::getConexao();
    }

    public function  getAll(){
        $sql = $this->db->query("SELECT * FROM financeiro_pessoal");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id_financeiro){
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro = ?");
        $sql->execute([$id_financeiro]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function cancel($id_financeiro) {
        $sql = $this->db->prepare("UPDATE financeiro_pessoal SET status=? WHERE id_financeiro=?");
        return $sql->execute(['Cancelado',$id_financeiro]);
    }
}
