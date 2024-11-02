<?php

require_once "DataBase.php";

class Financeiro{
    private $db;

    public function __construct(){
        $this->db = DataBase::getConexao();
    }

    public function getAll(){
        $resultado = $this->db->query("SELECT * FROM financeiro_pessoal");

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro = ?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function cancelar($id){
        $sql = $this->db->prepare("UPDATE financeiro_pessoal SET status=? WHERE id_financeiro=?");
        return $sql->execute(['Cancelado', $id]);
    }

    public function insert($data,$descricao,$valor,$deb_cred,$status){
        $sql = $this->db->prepare(
            "INSERT INTO financeiro_pessoal (data,descricao,valor,deb_cred,status)
            VALUES(?, ?, ?, ?, ?)"
        );
        return $sql->execute([$data,$descricao,$valor,$deb_cred,$status]);
    }

    public function update($id, $data, $descricao, $valor, $deb_cred, $status){
        $sql = $this->db->prepare(
            "UPDATE financeiro_pessoal SET data=?,descricao=?,valor=?,deb_cred=?,status=? WHERE id_financeiro=?"
        );
        return $sql->execute([$data, $descricao, $valor, $deb_cred, $status, $id]);
    }
}