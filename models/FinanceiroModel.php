<?php
require "DataBase.php";

class FinanceiroModel{
    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getAll(){
        $sql = $this->db->query("SELECT * FROM financeiro_pessoal");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idFinanceiro){
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro=?");
        $sql->execute([$idFinanceiro]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data, $descricao, $valor, $deb_cred, $status){
        $sql = $this->db->prepare("INSERT INTO financeiro_pessoal (data, descricao, valor,deb_cred, status) VALUES (?, ?, ?, ?, ?)");
        return $sql->execute([$data, $descricao, $valor, $deb_cred, $status]);
    }

    public function cancel($idFinanceiro){
        $sql = $this->db->prepare("UPDATE financeiro_pessoal SET status=? WHERE id_financeiro=?");
        return $sql->execute(["cancelado", $idFinanceiro]);
    }
}